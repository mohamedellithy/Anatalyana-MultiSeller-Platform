<?php

namespace Modules\Agencies\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgencyJoinTerm extends Model
{
    use HasFactory;

    protected $table = "agency_join_terms";
    protected $fillable = [
        'join_request_id',
        'agency_term_id',
        'term_name',
        'term_value'
    ];

    public function agency_term(){
        return $this->belongsTo('Modules\Agencies\Entities\AgencyTerm','agency_term_id','id');
    }

    protected static function newFactory()
    {
        return \Modules\Agencies\Database\factories\AgencyJoinTermFactory::new();
    }
}
