<?php

namespace Modules\Agencies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
class AgencyTranslation extends Model
{
    use HasFactory;

    protected $table = 'agency_translation';
    protected $fillable = ['agency_id','name','bio','services','meta_title','meta_description',
    'meta_image','campany_image','identity_file','products_file','lang'];

    public function scopeCurrentTranslation(Builder $query,$lang = null): void
    {
        $lang = $lang == null ? \App::getLocale() : $lang;
        $query->where('lang',$lang);
    }

    public function agency(){
        return $this->belongsTo('Modules\Agencies\Entities\Agency','agency_id','id');
    }

    public function scopeDefaultTranslation(Builder $query): void
    {
        $query->orWhere('lang',env('DEFAULT_LANGUAGE'));
    }

    protected static function newFactory()
    {
        return \Modules\Agencies\Database\factories\AgencyTranslationFactory::new();
    }
}
