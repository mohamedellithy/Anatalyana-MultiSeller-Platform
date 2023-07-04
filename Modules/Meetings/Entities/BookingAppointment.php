<?php

namespace Modules\Meetings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'appointment_id',
        'shop_id',
        'language',
        'status'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Meetings\Database\factories\BookingAppointmentFactory::new();
    }

    public function shop(){
        return $this->belongsTo(\App\Models\Shop::class,'shop_id','id');
    }

    public function user(){
        return $this->belongsTo(\App\Models\User::class,'user_id','id');
    }

    public function appointment(){
        return $this->belongsTo(Appointment::class,'appointment_id','id');
    }
}
