<?php

namespace Modules\Meetings\Http\Controllers\Front;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Meetings\Services\AppointmentService;
class AppointmentController extends Controller
{
    public $shop_appointments;
    public function __construct(AppointmentService $shop_appointments){
        $this->shop_appointments = $shop_appointments;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = [];
        if($request->query('shop') != null):
            $data['slug'] = $request->query('shop');
        endif;

        $shop_have_appointments = $this->shop_appointments->seller_appointments($data);
        return view('meetings::front.sellers_appointments.index',compact('shop_have_appointments'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function booking_appointment(Request $request)
    {
        $request->merge([
            'user_id' => auth()->user()->id,
            'status' => 'pending'
        ]);

        $booking_appointments = $this->shop_appointments->booking_appointment($request->only([
            'user_id',
            'shop_id',
            'appointment_id',
            'language',
            'status'
        ]));

        return response()->json([
            'data' => 1
        ]);
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
    public function show(Request $request , $shop_slug)
    {
        $appointments       = [];
        $appointment_booked = [];
        
        if(auth()->user()):
            $appointment_booked[]     = ['booking_appointments.user_id','=',auth()->user()->id];
        endif;

        // if($request->query('status') != null):
        //     $appointment_booked[]     = ['booking_appointments.status','=',$request->query('status')];
        // endif;

        if($request->query('date') != null):
            $appointments[]     = ['date','=',$request->query('date')];
        endif;

        $shop  = $this->shop_appointments->shop_with_appointments($shop_slug,$appointments,$appointment_booked);
        return view('meetings::front.sellers_appointments.show',compact('shop'));
    }

     /**
     * Show the specified resource.
     * @param string $status
     * @return Renderable
     */
    public function update_booking_appointment_status($id,$status){
        $update_status = $this->shop_appointments->update_appointments([
            'id'     => $id,
            'status' => $status,
            'user_id'=> auth()->user()->id
        ]);

        flash('Appointment Booking is updated successfully');

        return back();
    }

    public function all_booked_appointments(Request $request){
        $status = null;
        $data           = [];
        $appointments   = [];
        $appointments[] = ['appointments.date','>=',date('Y-m-d')];
        $data[]         = ['user_id','=',auth()->user()->id];

        if($request->query('status') != null):
            $data[]         = ['status','=',$request->query('status')];
        endif;

        if($request->query('date') != null):
            $appointments[]         = ['appointments.date','=',$request->query('date')];
        endif;

        $all_booked_appointment = $this->shop_appointments->all_booked_appointments($data,$appointments);

        return view('meetings::front.sellers_appointments.booked',compact('all_booked_appointment'));
    }

    public function all_ended_booked_appointments(Request $request){
        $status = null;
        $all_ended_booked_appointments = $this->shop_appointments->all_ended_booked_appointments([
            'user_id'=> auth()->user()->id,
        ]);

        return view('meetings::front.sellers_appointments.ended_booked',compact('all_ended_booked_appointments'));
    }
}
