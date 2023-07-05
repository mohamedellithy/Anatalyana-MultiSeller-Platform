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

    private static $endpoint = 'https://zoom.us/oauth';
    public static function url_to_zoom_app_auth(){
        $auth_app_url = self::$endpoint.'/authorize?response_type=code&client_id=' . env('ZOOM_CLIENT_KEY') . '&redirect_uri='.route('seller.meetings.appointments.zoom_app_integration');
        return $auth_app_url;
    }

    public static function integrate_zoom_service(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Basic '.base64_encode(env('ZOOM_CLIENT_KEY').":".env('ZOOM_CLIENT_SECRET'))
        ])->post(self::$endpoint."/token?grant_type=authorization_code&code=".$request->query('code')."&redirect_uri=".route('seller.meetings.appointments.zoom_app_integration'));

       // dd($response->json());

        if($response->successful()):
            $result = ConfigAppMeet::updateOrCreate([
                'shop_id'       => auth()->user()->shop->id,
                'access_token'  => $response->json()['access_token'],
                'refresh_token' => $response->json()['refresh_token'],
            ]);
            return $result;
        endif;
        return $response->json();
    }
}