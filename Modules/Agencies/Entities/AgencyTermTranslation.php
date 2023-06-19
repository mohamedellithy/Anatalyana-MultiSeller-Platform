<?php

namespace Modules\Agencies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgencyTermTranslation extends Model
{
    use HasFactory;
    
    protected $table = 'agency_term_translation';

    protected $fillable = ['agency_term_id','name','is_must','type_field','attachment_id','lang'];

    protected static function newFactory()
    {
        return \Modules\Agencies\Database\factories\AgencyTermTranslationFactory::new();
    }
}
