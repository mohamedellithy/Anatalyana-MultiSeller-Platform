<?php
namespace Modules\Meetings\Services;
use Modules\Meetings\Entities\Appointment;
use Modules\Meetings\Entities\AppointmentLanguage;
use Modules\Meetings\Entities\ConfigAppMeet;
use Modules\Meetings\Entities\BookingAppointment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
class ZoomService{

    private static $endpoint = 'https://zoom.us';
    public static function url_to_zoom_app_auth(){
        // $auth_app_url = self::$endpoint.'/oauth/authorize?response_type=code&client_id=' . env('ZOOM_CLIENT_KEY') . '&redirect_uri='.route('seller.meetings.appointments.zoom_app_integration');
        // return $auth_app_url;

        return route('seller.meetings.appointments.zoom_app_integration');
    }

    public static function integrate_zoom_service(Request $request){
    //     $response = Http::withHeaders([
    //         'Authorization' => 'Basic '.base64_encode(env('ZOOM_CLIENT_KEY').":".env('ZOOM_CLIENT_SECRET'))
    //     ])->post(self::$endpoint."/oauth/token?grant_type=authorization_code&code=".$request->query('code')."&redirect_uri=".route('seller.meetings.appointments.zoom_app_integration'));

    //    // dd($response->json());

    //     if($response->successful()):
    //         $result = ConfigAppMeet::updateOrCreate([
    //             'shop_id'       => auth()->user()->shop->id,
    //             'access_token'  => $response->json()['access_token'],
    //             'refresh_token' => $response->json()['refresh_token'],
    //         ]);
    //         return $result;
    //     endif;
    //     return $response->json();
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
        $host = self::check_credential_info($data);

        $resopnse = Http::withHeaders([
            'Authorization' => 'Bearer '.$host->access_token,
        ])->get(self::$endpoint.'/v2/users/email?email=mohamedellithyfreelancer@gmail.com');

        //dd($resopnse->json());

        if($resopnse->successful()):
            if($resopnse->json()['existed_email'] == false):
                $resopnse = Http::withHeaders([
                    'Authorization' => 'Bearer '.$host->access_token,
                ])->post(self::$endpoint.'/v2/users',[
                    "action" => "create",
                    "user_info" => [
                        "email"      => "mohamedellithyfreelancer@gmail.com",
                        "first_name" => "mohamed",
                        "last_name"  => "ellithy",
                        "password"   => "25121994moh",
                        "display_name" => "mohamed ellithy",
                        "type" => 1,
                        // "feature" => [
                        //     "zoom_phone"=> true,
                        //     "zoom_one_type" => 16
                        // ],
                       // "plan_united_type" => "1"
                    ]
                ]);
        
                dd($resopnse->json());
            endif;
        endif;

        $resopnse = Http::withHeaders([
            'Authorization' => 'Bearer '.$host->access_token,
        ])->post(self::$endpoint.'/v2/users/me/meetings',[
            "topic"      => "My Zoom Meeting",
            "type"       => 2,
            "duration"   => 60,
            "schedule_for" =>"mohamedellithyfreelancer@gmail.com",
            "start_time" => "2023-07-06T09:00:00Z",
            "timezone"   => "America/Los_Angeles",
            "settings"   => [
                "join_before_host" => true,
                "mute_upon_entry"  => true
            ]
        ]);

        return $resopnse->json();
    }
}