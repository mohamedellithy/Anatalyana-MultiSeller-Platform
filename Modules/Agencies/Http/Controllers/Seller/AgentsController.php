<?php

namespace Modules\Agencies\Http\Controllers\Seller;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Agencies\Entities\AgencyJoin;
use Modules\Agencies\Entities\AgencyJoinTerm;
class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $sort_by = [];
        $agents_join = AgencyJoin::with('customer','agency_country','agency_country.agency','agency_country.country');
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
        $compact[] = 'agents';
        return view('agencies::backend.seller.agents.index',compact($compact))->with($sort_by);
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
        $id = decrypt($id);
        $agent = AgencyJoin::with('customer','agency_country','agency_country.agency','agency_country.country')->find($id);
        $compact[] = 'agent';
        return view('agencies::backend.seller.agents.show',Compact($compact));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('agencies::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
        AgencyJoin::where('id',$id)->update([
            'status' => $request->input('status')
        ]);

        flash(translate('Agent Update Successful'))->success();
        return back();

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
