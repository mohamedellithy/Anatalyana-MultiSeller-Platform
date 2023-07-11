<?php
namespace Modules\Meetings\Services;
use Modules\Meetings\Entities\Appointment;
use Modules\Meetings\Entities\AppointmentLanguage;
use App\Models\Shop;
use Modules\Meetings\Entities\BookingAppointment;
use Modules\Meetings\Services\ZoomService;
use Modules\Meetings\Services\ServerToServerZoomService;
use Illuminate\Database\Eloquent\Builder;
class AppointmentService{

    public function seller_appointments($data = []){
        $seller_appointment = Shop::whereIn('user_id', verified_sellers_id())
        ->where($data)->orderBy('created_at','desc')->paginate(15);
        return $seller_appointment;
    }

    public function shop_with_appointments($slug_shop,$appointments_query = [],$appointment_booked = []){
        $appointments = Appointment::with([
            'appointment_languages' => function($query){
                return $query->select('language','appointment_id');
            },
            'appointment_booked' => function($query) use($appointment_booked){
                return $query->where($appointment_booked)->select('id','shop_id','appointment_id','status','language');
            }
        ])->WhereHas('shop',function($query) use($slug_shop) {
            return $query->whereIn('user_id',verified_sellers_id())->where('slug',$slug_shop);
        })->where($appointments_query)->orderBy('created_at','desc')->paginate(10);


        return $appointments;
    }

    public function booking_appointment($data){
        $attach_appointments = BookingAppointment::create($data);
        return $attach_appointments;
    }

    public function user_booked_appointments($user_id){
        $attach_appointments = BookingAppointment::where('user_id',$user_id)->first();
        return $attach_appointments;
    }

    public function update_appointments($data){
        $status = $data['status'];
        unset($data['status']);


        $booking_update = BookingAppointment::where($data)->update([
            'status' => $status
        ]);

        if($status == 'accepted'):
            $data['shop_id'] = auth()->user()->shop->id;
             //$create_meet = ZoomService::schedule_new_meet_appointment($data);
            $create_meet = ServerToServerZoomService::schedule_new_meet_appointment($data);
        endif;

        return $booking_update;
    }

    public function lists_booked_appointments($data,$appointments = [],$user = []){
        $query = BookingAppointment::with('shop','user','appointment','zoom_meeting_info')
        ->where($data)->orderBy('created_at','desc');

        if(count($user) > 0){
            $query = $query->whereHas('user',function(Builder $query) use($user){
                $query->where($user);
            });
        }

        if(count($appointments) > 0){
            $query = $query->whereHas('appointment',function(Builder $query) use($appointments){
                $query->where($appointments);
            });
        }

        $all_booked_appointment = $query->paginate(10);
        return $all_booked_appointment;
    }

    public function all_booked_appointments($data,$appointments){
        $all_booked_appointment = BookingAppointment::with('shop','user','appointment','zoom_meeting_info')
        ->where($data)->whereHas('appointment',function(Builder $query) use($appointments){
            $query->where($appointments);
        })->orderBy('created_at','desc')->paginate(10);
        return $all_booked_appointment;
    }

    public function all_ended_booked_appointments($data){
        $all_booked_appointment = BookingAppointment::with('shop','user','appointment','zoom_meeting_info')
        ->where($data)->whereHas('appointment',function(Builder $query){
            $query->where('appointments.date','<',date('Y-m-d'));
        })->orderBy('created_at','desc')->paginate(10);
        return $all_booked_appointment;
    }

    public function all($data = []){
        $query = Appointment::where('shop_id',auth()->user()->shop->id)->with('appointment_languages','appointment_booked');

        if(isset($data['status'])):
            $query = $query->where('status',$data['status']);
        endif;

        if(isset($data['booked_status'])):
            if($data['booked_status'] == 'booked'):
                $query = $query->whereHas('appointment_booked');
            else:
                $query = $query->whereDoesntHave('appointment_booked');
            endif;
        endif;

        if(isset($data['search'])):
            $query = $query->where('title','LIKE','%'.$data['search'].'%');
            $query = $query->orWhere('host_name','LIKE','%'.$data['search'].'%');
        endif;

        if(isset($data['date'])):
            $query = $query->where('date','=',$data['date']);
        endif;

        $appointment = $query->orderBy('created_at','desc')->paginate(10);

        return $appointment;
    }

    public function store($data){
        $appointment = Appointment::create($data);
        return $appointment;
    }

    public function add_languages($data){
        $languages            = array_filter(explode("|",$data['selected_languages']));
        $data_inserted        = [];
        foreach($languages as $language):
            $data_inserted[]  = [
                'language'       => $language,
                'appointment_id' => $data['appointment_id']
            ];
        endforeach;
        $appointment_language = AppointmentLanguage::insert($data_inserted);
        return $appointment_language;
    }

    public function show($id){
        return Appointment::with('appointment_languages')->find($id);
    }

    public function update($id,$data){
        $appointment = Appointment::where('id',$id)->update($data);
        return $appointment;
    }

    public function update_languages($id,$data){
        $languages            = array_filter(explode("|",$data['selected_languages']));
        $selected_languages   = AppointmentLanguage::where('appointment_id',$id)->pluck('language')->toArray();

        // deleted languages
        $deleted_languages    = array_diff($selected_languages,$languages);
        if(count($deleted_languages) > 0):
            AppointmentLanguage::where('appointment_id',$id)->whereIn('language',$deleted_languages)->delete();
        endif;

        // added new
        $data_inserted      = [];
        $added_languages    = array_diff($languages,$selected_languages);
        if(count($added_languages) > 0):
            foreach($added_languages as $language):
                $data_inserted[]  = [
                    'language'       => $language,
                    'appointment_id' => $id
                ];
            endforeach;
            $appointment_language = AppointmentLanguage::insert($data_inserted);
            return $appointment_language;
        endif;
    }

    public function destroy($id){
        $appointment = Appointment::find($id);
        $appointment->appointment_languages()->delete();
        $appointment->delete();
    }

    public function show_booking_request($data){
        $booking_appointment = BookingAppointment::with('shop','user','appointment','zoom_meeting_info')->where($data)->first();
        return $booking_appointment;
    }
}
