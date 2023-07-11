<?php
namespace Modules\Meetings\Services;
use Modules\Meetings\Entities\Appointment;
use Modules\Meetings\Entities\AppointmentLanguage;
use Modules\Meetings\Entities\ConfigAppMeet;
use Modules\Meetings\Entities\BookingAppointment;
use Modules\Meetings\Entities\ZoomMeetingAppointment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
class ServerToServerZoomService{

    private static $endpoint = 'https://zoom.us';
    public static function url_to_zoom_app_auth(){
        return route('seller.meetings.appointments.zoom_app_integration');
    }

    public static function integrate_zoom_service(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Basic '.base64_encode(env('ZOOM_CLIENT_KEY').":".env('ZOOM_CLIENT_SECRET')),
            'Host'          => 'zoom.us'
        ])->post(self::$endpoint."/oauth/token?grant_type=account_credentials&account_id=".env('ZOOM_ACCOUNT_ID'));

        if($response->successful()):
            $result = ConfigAppMeet::updateOrCreate([
                'shop_id'       => auth()->user()->shop->id,
                'access_token'  => $response->json()['access_token']
            ]);
            return $result;
        endif;
        return $response->json();
    }

    public static function check_credential_info($data){
        $result = ConfigAppMeet::where($data)->first();
        return $result;
    }

    public static function schedule_new_meet_appointment($data = []){
        $host = self::check_credential_info([
            'shop_id' => $data['shop_id']
        ]);

        if(!isset($data['id'])) return;

        $booked_appointment = BookingAppointment::where([
            'id' => $data['id']
        ])->first();

        $full_date = $booked_appointment->appointment->date .' '.$booked_appointment->appointment->start_at;
        $time_zone = timezones()[$booked_appointment->appointment->timezone];

        $resopnse = Http::withHeaders([
            'Authorization' => 'Bearer '.$host->access_token,
        ])->post(self::$endpoint.'/v2/users/me/meetings',[
            "topic"      => $booked_appointment->appointment->title ?: 'Anatalyana Meeting',
            "host_email" => $booked_appointment->shop->user->email ?: null,
            "alternative_hosts" => "{$booked_appointment->shop->user->email}",
            "type"       => 2,
            "start_time" => self::formate_time_zone($full_date,$time_zone),
            "timezone"   => $time_zone,
            "settings"   => [
                "join_before_host" => true,
                "mute_upon_entry"  => true
            ]
        ]);

        if($resopnse->successful()):
            $meet = $resopnse->json();
            ZoomMeetingAppointment::updateOrCreate([
                'booked_id' => $booked_appointment->id
            ],[
                'start_url'  => $meet["start_url"],
                'join_url'   => $meet["join_url"],
                'password'   => $meet["password"],
                'meeting_id' => $meet["id"] ?: $meet["uuid"],
                'host_id'    => $meet["host_id"]
            ]);
        endif;
        dd($resopnse->json());

        return $resopnse->json();
    }

    public static function formate_time_zone($time,$time_zone){
        // Create a new DateTime object with the desired date and time
        $date_time = new \DateTime($time);

        // Set the timezone to UTC
        $date_time->setTimezone(new \DateTimeZone($time_zone ?: 'UTC'));

        // Format the date and time in the desired format
        $formatted_time = $date_time->format('Y-m-d\TH:i:s\Z');

        return $formatted_time;
    }
}
