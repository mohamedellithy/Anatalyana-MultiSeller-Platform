<?php
namespace Modules\Agencies\Services;
Use Modules\Agencies\Entities\Agency;
use Modules\Agencies\Entities\AgencyTranslation;
use Modules\Agencies\Entities\AgencyCountry;
use Modules\Agencies\Entities\AgencyTerm;
use Modules\Agencies\Entities\AgencyTermTranslation;

class AgencyServices{

    public function store_agency_info(array $data){
        $data['seller_id'] = auth()->user()->id;
        $insert_agency = Agency::create($data);
        return $insert_agency;
    }

    public function update_agency_info(array $data){
        if($data['lang'] == env('DEFAULT_LANGUAGE')){
            $agency_id = auth()->user()->agency->update($data);
        }

    }

    public function agency_info_translation(array $data){
        $translation  = AgencyTranslation::updateOrCreate([
            'agency_id' => $data['agency_id'],
            'lang'      => $data['lang']
        ],$data);

        return $translation;
    }

    public function store_agency_country(array $data){
        $insert_agency_country = AgencyCountry::create($data);
        return $insert_agency_country;
    }

    public function store_agency_terms(array $data){
        $insert_agency_terms = AgencyTerm::create($data);
        return $insert_agency_terms;
    }

    public function store_agency_terms_translation(array $data){
        $insert_agency_terms_translation = AgencyTermTranslation::create($data);
        return $insert_agency_terms_translation;
    }

    public function update_agency_country(array $data,$agency_country_id){
        $update = auth()->user()->agency->agency_country()->where([
           'id' => $agency_country_id
        ])->update($data);

        return $update;
    }

    public function update_agency_term(array $data,$term_id){
        
        $term_parent = auth()->user()->agency->agency_terms()->where([
            'agency_terms.id' => $term_id
        ])->first();

        if($data['lang'] == env('DEFAULT_LANGUAGE')):
            $term_parent->update([
                'name'          => $data['name'],
                'is_must'       => isset($data['is_must']) ? $data['is_must'] : 0,
                'type_field'    => $data['type_field'],
                'attachment_id' => $data['attachment_id']
            ]);
        endif;

        $update = $term_parent->agency_term_translation()->updateOrCreate([
            'lang'          => $data['lang']
        ],[
            'name'          => $data['name'],
            'is_must'       => isset($data['is_must']) ? $data['is_must'] : 0,
            'type_field'    => $data['type_field'],
            'attachment_id' => $data['attachment_id']
        ]);
 
        return $update;
    }
}
