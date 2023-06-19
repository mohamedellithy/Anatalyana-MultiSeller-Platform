<?php

namespace Modules\Agencies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
class Agency extends Model
{
    use HasFactory;

    protected $table = 'agencies';

    protected $fillable = ['seller_id','name','bio','services','meta_title','meta_description',
    'meta_image','campany_image','identity_file','products_file'];

    public function agency_country(){
        return $this->hasMany('Modules\Agencies\Entities\AgencyCountry','agency_id','id');
    }

    public function agency_translation(){
        return $this->hasMany('Modules\Agencies\Entities\AgencyTranslation','agency_id','id');
    }

    public function agency_terms(){
        return $this->hasManyThrough("Modules\Agencies\Entities\AgencyTerm", "Modules\Agencies\Entities\AgencyCountry",'agency_id','agency_country_id');
    }

    public function agency_joins(){
        return $this->hasManyThrough("Modules\Agencies\Entities\AgencyJoin", "Modules\Agencies\Entities\AgencyCountry",'agency_id','agency_country_id');
    }

    public function seller(){
        return $this->belongsTo('App\Models\User','seller_id','id');
    }


    public function get_translation($field = null,$lang = null){
        $lang = $lang == null ? \App::getLocale() : $lang;
        $translate = $this->agency_translation()->where('lang',$lang)->first();
        if(!$translate) $translate = $this;

        return $field == null ? $translate : $translate->$field;
    }

    // public function scopeTranslation(Builder $query,$lang = null): void
    // {
    //     $lang = $lang == null ? \App::getLocale() : $lang;
    //     $query->with('agency_translation',function($query) use($lang){
    //         $query->where('lang',$lang);
    //     });
    // }

    protected static function newFactory()
    {
        return \Modules\Agencies\Database\factories\AgencyFactory::new();
    }


}
