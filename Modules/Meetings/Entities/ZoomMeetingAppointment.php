<?php

namespace Modules\Meetings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ZoomMeetingAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booked_id',
        'start_url',
        'join_url',
        'password',
        'meeting_id',
        'host_id'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Meetings\Database\factories\ZoomMeetingAppointmentFactory::new();
    }
}
