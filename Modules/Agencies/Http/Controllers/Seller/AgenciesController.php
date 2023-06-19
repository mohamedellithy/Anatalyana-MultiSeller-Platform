<?php

namespace Modules\Agencies\Http\Controllers\Seller;

use Faker\Provider\Lorem;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Agencies\Entities\AgencyTranslation;
use Modules\Agencies\Http\Requests\AgencyRequest;
use Modules\Agencies\Http\Requests\AgencyCountryRequest;
use Modules\Agencies\Entities\AgencyCountry;
use Modules\Agencies\Http\Requests\AgencyTermsRequest;
use Modules\Agencies\Entities\AgencyTerm;
use Modules\Agencies\Entities\Agency;

use Modules\Agencies\Services\AgencyServices;
class AgenciesController extends Controller
{
    protected $agencyService;
    public function __construct(AgencyServices $agency){
        $this->agencyService = $agency;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $agency         = Agency::with('agency_country')->where([
                             'seller_id' => auth()->user()->id
                          ])->first();
        if($agency):
            $agency_countries = $agency->agency_country()->paginate(10);
            $Compact[]      = "agency_countries";
        endif;
        $Compact[]      = "agency";
        return view('agencies::backend.seller.agencies.index',compact($Compact));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function agency_info(Request $request)
    {
        $section         = 'create';
        $Compact         = [];

        // on edit request
        if(auth()->user()->agency):
            $section = 'edit';
            $lang         = $request->query('lang') ?: env('DEFAULT_LANGUAGE');
            $campany_info = AgencyTranslation::where([
                                'agency_id' => auth()->user()->agency->id,
                                'lang'      => $lang
                            ])->first();

            if(!$campany_info):
                $campany_info = auth()->user()->agency;
            endif;
            //dd($campany_info);
            $Compact[]    = 'campany_info';
            $Compact[]    = 'lang';
        endif;
        // on edit request

        return view('agencies::backend.seller.agencies.'.$section.'.agency-info',Compact($Compact));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store_agency_info(AgencyRequest $request)
    {
        //
        $agency = $this->agencyService->store_agency_info($request->only([
            'name','bio','services','meta_title','meta_description',
            'meta_image','campany_image','identity_file','products_file'
        ]));

        // add translation by default
        $request->merge([
            'agency_id' => $agency->id,
            'lang'      => env('DEFAULT_LANGUAGE')
        ]);

        $this->agencyService->agency_info_translation($request->only([
            'name','bio','services','meta_title','meta_description',
            'meta_image','campany_image','identity_file','products_file','lang','agency_id'
        ]));

        flash(translate('Agency has been inserted successfully'))->success();

        return back();
    }

     /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function update_agency_info(AgencyRequest $request)
    {
        //
        $this->agencyService->update_agency_info($request->only([
            'name','bio','services','meta_title','meta_description',
            'meta_image','campany_image','identity_file','products_file','lang'
        ]));

        // insert translation
        $this->agencyService->agency_info_translation($request->only([
            'name','bio','services','meta_title','meta_description',
            'meta_image','campany_image','identity_file','products_file','lang','agency_id'
        ]));

        flash(translate('Agency has been updated successfully'))->success();

        return back();
    }


    public function create_agency_country(Request $request){
        return view('agencies::backend.seller.agencies.create.agency-country');
    }

    public function store_agency_country(AgencyCountryRequest $request){
        $request->merge([
            'agency_id' => auth()->user()->agency->id
        ]);

        $agency_country = $this->agencyService->store_agency_country($request->only([
            'agency_id','country_id','price','status'
        ]));

        return redirect()->route('seller.create-agency-terms',['agency_country_id' => $agency_country->id]);
    }


    public function create_agency_terms(Request $request,$agency_country_id){
        $agency_terms   = auth()->user()->agency->agency_terms()->with('agency_term_translation')->where(['agency_terms.agency_country_id' => $agency_country_id])->get();
        $agency_country = auth()->user()->agency->agency_country()->with('country')->find($agency_country_id);

        if(!$agency_country) abort(404);
        $compact[]      = 'agency_country_id';
        $compact[]      = 'agency_terms';
        $compact[]      = 'agency_country';
        return view('agencies::backend.seller.agencies.create.agency-terms',compact($compact));
    }

    public function store_agency_terms(AgencyTermsRequest $request,$agency_country_id){
        $request->merge([
            'agency_country_id' => $agency_country_id
        ]);

        $agency_terms = $this->agencyService->store_agency_terms($request->only([
            'agency_country_id','name','is_must','type_field','attachment_id'
        ]));


        $request->merge([
            'agency_term_id' => $agency_terms->id,
            'lang'           => env('DEFAULT_LANGUAGE')
        ]);

        $agency_terms_translation = $this->agencyService->store_agency_terms_translation($request->only([
            'agency_term_id','name','is_must','type_field','attachment_id','lang'
        ]));

        return redirect()->route('seller.create-agency-terms',['agency_country_id' => $agency_country_id]);
    }

    public function edit_agency_country(Request $request,$agency_country_id){
        $agency_country   = auth()->user()->agency->agency_country()->with('country','agency_terms')->where(['agency_countries.id' => $agency_country_id])->first();
        $compact[]        = 'agency_country';
        if(!$agency_country) abort(404);
        return view('agencies::backend.seller.agencies.edit.agency-country',compact($compact));
    }

    public function update_agency_country(Request $request,$agency_country_id){
        //
        $agency_terms = $this->agencyService->update_agency_country($request->only([
            'country_id','price','status'
        ]),$agency_country_id);

        flash(translate('agency country is updated successfuly'))->success();

        return back();
    }

    public function delete_agency_country(Request $request,$agency_country_id){
        // delete terms agency country
        auth()->user()->agency->agency_terms()->where([
            'agency_country_id' => $agency_country_id
        ])->delete();

        // delete agency country
        auth()->user()->agency->agency_country()->where([
           'id' => $agency_country_id
        ])->delete();

        flash(translate('agency country is deleted successfuly'))->success();

        return back();
    }

    public function delete_agency_term(Request $request,$term_id){
        // delete terms agency country
        auth()->user()->agency->agency_terms()->where([
            'agency_terms.id' => $term_id
        ])->delete();

        flash(translate('agency country is deleted successfuly'))->success();

        return back();
    }

    public function edit_agency_term(Request $request,$agency_country_id,$term_id){

        // get terms agency country
        $agency_terms = auth()->user()->agency->agency_terms()
        ->AgencyTermTranslation()->where([
            'agency_terms.agency_country_id' => $agency_country_id
        ])->get();

        $lang  = $request->query('lang') ?: env('DEFAULT_LANGUAGE');

        //dd($agency_terms);
        $agency_terms = collect($agency_terms);

        $term      = $agency_terms->where('agency_term_id', $term_id)->where('lang',$lang)->first();

        if(!$term):
            $term  = $agency_terms->where('agency_term_id', $term_id)->where('lang',env('DEFAULT_LANGUAGE'))->first();
        endif;

        $agency_terms = $agency_terms->where('lang',env('DEFAULT_LANGUAGE'))->where('agency_term_id','!=',$term_id);

        $compact[]        = 'agency_terms';
        $compact[]        = 'term';
        $compact[]        = 'lang';

        return view('agencies::backend.seller.agencies.edit.agency-terms',compact($compact));
    }

    public function update_agency_term(Request $request,$term_id){
        //
        $agency_terms = $this->agencyService->update_agency_term($request->only([
            'name','is_must','type_field','attachment_id','lang'
        ]),$term_id);

        flash(translate('agency term is updated successfuly'))->success();

        return back();
    }


}
