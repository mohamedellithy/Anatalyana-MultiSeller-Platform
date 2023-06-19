<?php

namespace Modules\Agencies\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;
class AgencyCountryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'country_id' => [
                'required',
                 Rule::unique('agency_countries','country_id')->ignore($this->route('id'))->where(function($query){
                    $query->where('agency_id', auth()->user()->agency->id);
                })
            ],
            'price' => 'required|gte:0'
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'country_id.required' => 'country is required',
            'country_id.unique'   => 'country is already exist'
        ];
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
}
