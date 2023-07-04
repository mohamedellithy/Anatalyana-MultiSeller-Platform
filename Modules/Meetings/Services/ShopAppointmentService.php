<?php 
namespace Modules\Meetings\Services;
use Modules\Meetings\Entities\Appointment;
use Modules\Meetings\Entities\AppointmentLanguage;
use App\Models\Shop;
use Modules\Meetings\Entities\BookingAppointment;
use Illuminate\Database\Eloquent\Builder;
class ShopAppointmentService{

    public function seller_appointments(){
        $seller_appointment = Shop::whereIn('user_id', verified_sellers_id())
        ->paginate(15);
        return $seller_appointment;
    }

    public function shop_with_appointments($slug_shop,$user_id = null){
        $shop = Shop::with(['appointments'=> function($query){
                return $query->select('id','shop_id','title','description','start_at','end_at','date','timezone','host_name');
            },'appointments.appointment_languages'=> function($query){
                return $query->select('language','appointment_id');
            },'appointments.appointment_booked' => function($query) use($user_id){
                return $query->where('user_id',$user_id)->select('id','shop_id','appointment_id','status','language');
            }])->whereIn('user_id',verified_sellers_id())->where('slug',$slug_shop)->first();
        return $shop;
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
        $booking_update = BookingAppointment::where([
            'id'      => $data['id'],
            'user_id' => $data['user_id'],
        ])->update([
            'status' => $data['status']
        ]);
        return $booking_update;
    }

    public function all_booked_appointments($data){
        $all_booked_appointment = BookingAppointment::with('shop','user','appointment')
        ->where($data)->whereHas('appointment',function(Builder $query){
            $query->where('appointments.date','>=',date('Y-m-d'));
        })->paginate(10);
        return $all_booked_appointment;
    }

    public function all_ended_booked_appointments($data){
        $all_booked_appointment = BookingAppointment::with('shop','user','appointment')
        ->where($data)->whereHas('appointment',function(Builder $query){
            $query->where('appointments.date','<',date('Y-m-d'));
        })->paginate(10);
        return $all_booked_appointment;
    }
}