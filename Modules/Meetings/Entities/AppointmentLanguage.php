<?php

namespace Modules\Meetings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppointmentLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'language',
        'appointment_id'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Meetings\Database\factories\AppointmentLanguageFactory::new();
    }
}
