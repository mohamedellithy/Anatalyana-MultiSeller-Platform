<?php

namespace Modules\Agencies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgencyCountry extends Model
{
    use HasFactory;

    protected $table = 'agency_countries';

    protected $fillable = ['agency_id','country_id','price','status'];

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }

    public function agency_terms(){
        return $this->hasMany('Modules\Agencies\Entities\AgencyTerm','agency_country_id','id');
    }

    public function agency(){
        return $this->belongsTo('Modules\Agencies\Entities\Agency','agency_id','id');
    }

    public function agency_join(){
        return $this->hasMany('Modules\Agencies\Entities\AgencyJoin','agency_country_id','id');
    }

    protected static function newFactory()
    {
        return \Modules\Agencies\Database\factories\AgencyCountryFactory::new();
    }
}
