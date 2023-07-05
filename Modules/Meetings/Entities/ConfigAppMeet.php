<?php

namespace Modules\Meetings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConfigAppMeet extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'access_token',
        'refresh_token',
        'app_name'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Meetings\Database\factories\ConfigAppMeetFactory::new();
    }
}
