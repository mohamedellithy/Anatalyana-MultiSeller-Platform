<?php

namespace Modules\Agencies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgencyProduct extends Model
{
    use HasFactory;

    protected $table = 'agency_products';

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Agencies\Database\factories\AgencyProductFactory::new();
    }
}
