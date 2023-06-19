<?php

namespace Modules\Agencies\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Agencies\Entities\Agency;
use Modules\Agencies\Entities\AgencyJoin;
class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $agencies  = Agency::with('seller','seller.shop')->withCount('agency_country','agency_joins');
        if($request->query('approved_status') != null):
            $agencies = $agencies->where([
                'status' => $request->query('approved_status')
            ]);
        endif;

        if($request->query('search') != null):
            $agencies = $agencies->whereHas('seller.shop',function($query) use($request){
                $query->where('name','LIKE','%'.$request->query('search').'%');
            });
        endif;

        $agencies = $agencies->paginate(10);
        $compact[] = 'agencies';
        return view('agencies::backend.admin.agencies.index',compact($compact));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('agencies::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $agency  = Agency::with('seller','seller.shop','agency_country','agency_country.country','agency_country.agency_join')->withCount('agency_country','agency_joins')->find($id);
        $compact[] = 'agency';
        return view('agencies::backend.admin.agencies.show',compact($compact));
    }

    
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show_agency_agents(Request $request,$agency_id)
    {
        $sort_by = [];
        $agency_id = decrypt($agency_id);
        $agents_join = AgencyJoin::whereHas('agency_country',function($query) use($agency_id){
            $query->where('agency_id',$agency_id);
        })->with('customer','agency_country','agency_country.agency','agency_country.country');

        if($request->query('status') != null):
            $sort_by['status'] = $request->query('status');
        endif;

        if($request->query('payment_status') != null):
            $sort_by['payment_status'] = $request->query('payment_status');
        endif;

        $agents_join = $agents_join->where($sort_by);

        if($request->query('search') != null):
            $sort_by['sort_search'] = $request->query('search');
            $agents_join = $agents_join->whereHas('customer',function($query) use ($request){
                $query->where('email','LIKE','%'.$request->query('search').'%');
            });
        endif;

        $agents = $agents_join->paginate(20);
        $agency = Agency::find($agency_id);
        $compact[] = 'agents';
        $compact[] = 'agency';
        return view('agencies::backend.admin.agents.index',compact($compact));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update_agency_agents(Request $request)
    {
        //
        $update_agency = Agency::where('id',$request->input('id'))->update([
            'status' => $request->input('status')
        ]);

        return response()->json([
            'data' => $update_agency
        ]);
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
