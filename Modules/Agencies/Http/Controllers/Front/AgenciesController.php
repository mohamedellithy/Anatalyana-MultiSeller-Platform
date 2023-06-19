<?php

namespace Modules\Agencies\Http\Controllers\Front;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Agencies\Entities\AgencyTranslation;
use Modules\Agencies\Entities\Agency;
use Modules\Agencies\Entities\AgencyTerm;
use Modules\Agencies\Entities\AgencyJoin;
use Modules\Agencies\Entities\AgencyJoinTerm;
use Modules\Agencies\Http\Requests\AgencyJoinRequest;

class AgenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $agencies = Agency::with('agency_translation')->get();
        $compact[] = 'agencies';
        return view('agencies::front.agencies.index',Compact($compact));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function agency_join(Request $request,$agency_id)
    {
        $agency = Agency::with('agency_translation','agency_country','agency_country.agency_terms','agency_country.agency_terms.agency_term_translation')->find($agency_id);
        $compact[] = 'agency';
        return view('agencies::front.agencies.join',Compact($compact));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function create_join_request(AgencyJoinRequest $request)
    {
        //
        $check_if_application_made = AgencyJoin::where([
            'customer_id'       => auth()->user()->id,
            'agency_country_id' => $request->input('agency_country_id')
        ])->first();

        if($check_if_application_made){
            flash(translate('Your Application is made before thank you'))->error();
            return redirect()->route('agencies-join-orders-dashboard');
        }

        $join_request = AgencyJoin::create([
                'customer_id'       => auth()->user()->id,
                'agency_country_id' => $request->input('agency_country_id'),
                'first_name'        => $request->input('first_name'),
                'last_name'         => $request->input('last_name'),
                'phone'             => $request->input('phone'),
                'postal_code'       => $request->input('postal_code'),
                'address'            => $request->input('address')
        ]);

        $terms_all = AgencyTerm::with('agency_term_translation')->where([
            'agency_country_id' => $request->input('agency_country_id')
        ])->get();

        $terms_answered = [];
        foreach($terms_all as $term):
            if($term->type_field == 'alert') continue;

            if($request->has('term_'.$term->id)):
                $terms_answered[] = [
                    'join_request_id' => $join_request->id,
                    'agency_term_id'  => $term->id,
                    'term_name'       => $term->name,
                    'term_value'      => $request->input('term_'.$term->id)
                ];
            endif;
        endforeach;

        AgencyJoinTerm::insert($terms_answered);
        flash(translate('Application is Filled Successfully Your Request is Sent and will replay soon'))->success();
        return redirect()->route('agencies-join-orders-dashboard');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function agency_show($id)
    {
        $agency = Agency::with('agency_translation','agency_country','agency_country.agency_terms','agency_country.agency_terms.agency_term_translation')->find($id);
        $compact[] = 'agency';
        return view('agencies::front.agencies.show',Compact($compact));
    }

    public function terms_agency_country(Request $request){

        $agency_terms = AgencyTerm::with('agency_term_translation')->where([
            'agency_country_id' => intval($request->input('agency_country_id'))
        ])->get();
        $compact[] = 'agency_terms';
        return response()->json([
            'html' => view('agencies::front.partials.terms_fields',Compact($compact))->render()
        ]);
    }

    public function agencies_orders_dashboard(Request $request){
        $agencies_requests = AgencyJoin::with('agency_country','agency_country.agency','agency_country.country')->where([
            'customer_id' => auth()->user()->id
        ])->paginate(10);
        $compact[] = 'agencies_requests';
        return view('agencies::front.customer.agencies.index',compact($compact));
    }

    public function agency_join_info($request_id){
        $agency_request_info = AgencyJoin::with('agency_country','agency_country.agency','agency_country.country','agency_join_terms')->where([
            'customer_id' => auth()->user()->id,
        ])->find($request_id);
        $compact[] = 'agency_request_info';
        return view('agencies::front.customer.agencies.show',compact($compact));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
