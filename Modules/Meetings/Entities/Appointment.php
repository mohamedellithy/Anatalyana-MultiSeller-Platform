<?php

namespace Modules\Meetings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'title',
        'description',
        'host_name',
        'timezone',
        'date',
        'start_at',
        'end_at',
        'status'
    ];


    protected static function newFactory()
    {
        return \Modules\Meetings\Database\factories\AppointmentFactory::new();
    }

    public function appointment_languages(){
        return $this->HasMany(AppointmentLanguage::class,'appointment_id','id');
    }

    public function appointment_booked(){
        return $this->HasOne(BookingAppointment::class,'appointment_id','id')->whereIn('booking_appointments.status',[
            'pending',
            'accepted',
            'completed'
        ]);
    }
}
