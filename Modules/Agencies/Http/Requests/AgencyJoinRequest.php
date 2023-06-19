<?php

namespace Modules\Agencies\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Agencies\Entities\AgencyTerm;
class AgencyJoinRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public $messages = [];
    public $validate_terms = [];
    public function rules()
    {
        $this->validate_terms =  [
            //
            'first_name'  => 'required|max:255',
            'last_name'   => 'required|max:255',
            'phone'       => 'required|numeric',
            'postal_code' => 'required|numeric',
            'address'     => 'required',
            'agency_country_id' => 'required'
        ];

        $this->get_terms_validate('rules');

        return $this->validate_terms;
    }

     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        $this->messages =  [
            'agency_country_id.required'   => 'Agency Country is required',
            'first_name.required'          => 'First Name is required',
            'last_name.required'           => 'Last Name is required',
            'phone.required'               =>  'phone is required',
            'postal_code.required'         => 'phone is required',
            'address.required'             => 'address is required'
        ];

        $this->get_terms_validate('message');

        return $this->messages;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function get_terms_validate($type = 'message'){

        $agency_terms = AgencyTerm::with('agency_term_translation')->where([
            'agency_country_id' => $this->request->get('agency_country_id')
        ])->get();

        foreach($agency_terms as $agency_term):
            if($type == 'message'):
                if($agency_term->is_must == 1 && $agency_term->type_field != 'alert'):
                    $this->messages['term_'.$agency_term->id.'.required'] = 'Must Fill This term \' '.$agency_term->name.' \'';
                endif;
            else:

                if($agency_term->is_must == 1 && $agency_term->type_field != 'alert'):
                    $this->validate_terms['term_'.$agency_term->id][] = 'required';
                endif;
            endif;
        endforeach;
    }
}
