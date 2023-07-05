<?php

namespace Modules\Meetings\Http\Controllers\Seller;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Meetings\Services\AppointmentService;
use MacsiDigital\Zoom\Facades\Zoom;
use Illuminate\Support\Facades\Http;
class AppointmentController extends Controller
{
    protected $appointmentService;
    public function __construct(AppointmentService $appointmentService){
        $this->appointmentService = $appointmentService;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {

        $response = Http::withHeaders([
            'Authorization' => 'Basic '.base64_encode(env('ZOOM_CLIENT_KEY').":".env('ZOOM_CLIENT_SECRET')),
            'Host'          => 'zoom.us'
        ])->post("https://zoom.us/oauth/token",[
            "grant_type" => 'account_credentials',
            "account_id" => "RhaUP7ffRsim-_1WOB9urQ"
        ]);

        dd($response->json());

        $data = [];
        if($request->has('booked_status')):
            $data['booked_status'] = $request->query('booked_status');
        endif;

        if($request->has('status')):
            $data['status']        = $request->query('status');
        endif;

        if($request->has('search')):
            $data['search']        = $request->query('search');
        endif;

        if($request->has('date')):
            $data['date']        = $request->query('date');
        endif;

        $appointments = $this->appointmentService->all($data);
        return view('meetings::backend.seller.appointments.index',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Basic '.base64_encode(env('ZOOM_CLIENT_KEY').":".env('ZOOM_CLIENT_SECRET'))
        ])->post("https://zoom.us/oauth/token",[
            "grant_type" => 'authorization_code',
            "code" => $request->query('code'),
            "redirect_uri" => 'https://anatalyana.com/',
        ]);

        dd($response->json());
        return view('meetings::backend.seller.appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        $request->merge([
            'shop_id'   => auth()->user()->shop->id,
            'status'    => $request->input('status') ?: 0
        ]);

        $appointment = $this->appointmentService->store($request->only([
            'shop_id',
            'title',
            'description',
            'host_name',
            'timezone',
            'date',
            'start_at',
            'end_at',
            'status'
        ]));

        $request->merge([
            'appointment_id' => $appointment->id,
        ]);

        $appointment_languages = $this->appointmentService->add_languages($request->only([
            'appointment_id',
            'selected_languages'
        ]));

        flash('Appointment is Added Successfully');

        return redirect()->route('seller.meetings.appointments.index');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $appointments = $this->appointmentService->show($id);
        return view('meetings::backend.seller.appointments.single',compact('appointments'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $appointment = $this->appointmentService->show($id);
        return view('meetings::backend.seller.appointments.edit',compact('appointment'));
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

        $request->merge([
            'shop_id'   => auth()->user()->shop->id,
            'status'    => $request->input('status') ?: 0
        ]);

        $appointment = $this->appointmentService->update($id,$request->only([
            'shop_id',
            'title',
            'description',
            'host_name',
            'timezone',
            'date',
            'start_at',
            'end_at',
            'status'
        ]));

        $appointment_languages = $this->appointmentService->update_languages($id,$request->only([
            'selected_languages'
        ]));

        flash('Appointment is Updated Successfully');

        return back();
    }

    public function update_status(Request $request){
        $request->merge([
            'status'    => $request->input('status') ?: 0
        ]);

        $appointment = $this->appointmentService->update(intval($request->input('id')),$request->only([
            'status'
        ]));

        return response()->json([
            'data' => 1
        ]);
    }

    public function booking_requests(Request $request){
        $status = null;

        $data['shop_id'] =  auth()->user()->shop->id;
        $user          = [];
        $appointments  = [];
        if($request->query('status') != null):
            $data['status']   = $request->query('status');
        endif;

        if($request->query('language') != null):
            $data['language']   = $request->query('language');
        endif;

        if($request->query('search') != null):
            $user[]   = ['name','LIKE','%'.$request->query('search').'%'];
        endif;

        if($request->query('date') != null):
            $appointments[]   = ['date','=',$request->query('date')];
        endif;

        if($request->query('date_status') != null):
            if($request->query('date_status') == 'today'):
                $start_at = date('Y-m-d');
                $end_at   = date('Y-m-d',strtotime('+1 day'));
            elseif($request->query('date_status') == 'this_week'):
                $start_at = date('Y-m-d');
                $end_at   = date('Y-m-d',strtotime('next saturday'));
            elseif($request->query('date_status') == 'this_month'):
                $start_at = date('Y-m-d');
                $end_at   = date('Y-m-d',strtotime('first day of next month'));
            elseif($request->query('date_status') == 'this_year'):
                $start_at = date('Y-m-d');
                $end_at   = date('Y-m-d',strtotime('first day of January next year'));
            endif;
            $appointments[]   = ['date','>=',$start_at];
            $appointments[]   = ['date','<' ,$end_at];
        endif;

        $booking_requests = $this->appointmentService->lists_booked_appointments($data,$appointments,$user);
        return view('meetings::backend.seller.bookings.booking_requests',compact('booking_requests'));
    }

    public function destroy($id)
    {
        //
        $appointments = $this->appointmentService->destroy($id);
        flash('Appointment Deleted Successfully');
        return back();
    }


    public function edit_booking_requests($id){
        $status = null;
        $booking_request = $this->appointmentService->show_booking_request([
            'id' => $id,
        ]);
        return view('meetings::backend.seller.bookings.details',compact('booking_request'));
    }

    public function update_booking_requests(Request $request,$id){
        $request->merge([
            'id' => $id
        ]);
        $update_status = $this->appointmentService->update_appointments($request->only([
            'id',
            'status'
        ]));

        flash('Appointment Booking is updated successfully');

        return back();
    }

    public function lists_booked(Request $request){
        $status = null;

        $data            = [];
        $data            = [
            ['shop_id','=',auth()->user()->shop->id],
            ['status','=','accepted']
        ];
        $user            = [];
        $appointments    = [];
        $appointments[]  = ['appointments.date' , '=',date('Y-m-d')];

        if($request->query('language') != null):
            $data['language']   = $request->query('language');
        endif;

        if($request->query('search') != null):
            $user[]   = ['name','LIKE','%'.$request->query('search').'%'];
        endif;

        $booking_requests = $this->appointmentService->lists_booked_appointments($data,$appointments,$user);
        return view('meetings::backend.seller.bookings.booking_by_date',compact('booking_requests'));
    }

    public function lists_expired_booked(Request $request){
        $status = null;

        $data            = [];
        $data            = [
            ['shop_id','=',auth()->user()->shop->id]
        ];

        if($request->query('status') != null):
            $data[]   = ['status' ,'=', $request->query('status')];
        endif;

        $user            = [];
        $appointments    = [];
        $appointments[]  = ['appointments.date' , '<',date('Y-m-d')];

        if($request->query('language') != null):
            $data['language']   = $request->query('language');
        endif;

        if($request->query('search') != null):
            $user[]   = ['name','LIKE','%'.$request->query('search').'%'];
        endif;

        $booking_requests = $this->appointmentService->lists_booked_appointments($data,$appointments,$user);
        return view('meetings::backend.seller.bookings.ended_booked',compact('booking_requests'));
    }
}
