<?php

namespace Modules\Agencies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgencyJoin extends Model
{
    use HasFactory;

    protected $table = "agency_join_requests";
    protected $fillable = [
        'agency_country_id',
        'customer_id',
        'first_name',
        'last_name',
        'phone',
        'postal_code',
        'address',
        'status',
        'payment_status'
    ];

    public function agency_join_terms(){
        return $this->hasMany('Modules\Agencies\Entities\AgencyJoinTerm','join_request_id','id');
    }


    public function customer(){
        return $this->belongsTo('App\Models\User','customer_id','id');
    }

    public function agency_country(){
        return $this->belongsTo('Modules\Agencies\Entities\AgencyCountry','agency_country_id','id');
    }

    protected static function newFactory()
    {
        return \Modules\Agencies\Database\factories\AgencyJoinRequestFactory::new();
    }
}
