<?php

namespace Modules\Agencies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;


class AgencyTerm extends Model
{
    use HasFactory;

    protected $table = 'agency_terms';

    protected $fillable = ['agency_country_id','name','is_must','type_field','attachment_id'];

    public function agency_term_translation(){
        return $this->hasMany('Modules\Agencies\Entities\AgencyTermTranslation','agency_term_id','id');
    }

    /**
     * Scope a query to only include popular users.
     */
    public function scopeAgencyTermTranslation(Builder $query): void
    {
        $query->rightJoin('agency_term_translation','agency_term_translation.agency_term_id','=','agency_terms.id')
        ->select('agency_terms.agency_country_id','agency_term_translation.*');
        
    }

    protected static function newFactory()
    {
        return \Modules\Agencies\Database\factories\AgencyTermFactory::new();
    }
}
