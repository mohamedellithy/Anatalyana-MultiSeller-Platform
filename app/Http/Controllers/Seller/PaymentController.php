<?php

namespace App\Http\Controllers\Seller;

use App\Models\Payment;
use Auth;
use Illuminate\Http\Request;
use App\Models\user;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::where('seller_id', Auth::user()->id)->paginate(9);
        return view('seller.payments.payment_history', compact('payments'));
    }

    public function setting_payment(){
        $user = auth()->user();
        return view('seller.payments.payment_settings',compact('user'));
    }

    public function update_setting_payment(Request $request,$id){
        if(env('DEMO_MODE') == 'On'){
            flash(translate('Sorry! the action is not permitted in demo '))->error();
            return back();
        }

        $user = User::findOrFail($id);
        $shop = $user->shop;

        if($shop){
            $shop->cash_on_delivery_status = $request->cash_on_delivery_status;
            $shop->bank_payment_status = $request->bank_payment_status;
            $shop->bank_name = $request->bank_name;
            $shop->bank_acc_name = $request->bank_acc_name;
            $shop->bank_acc_no = $request->bank_acc_no;
            $shop->bank_routing_no = $request->bank_routing_no;

            $shop->save();
        }
        flash(translate('Your Payments settings has been updated successfully!'))->success();
        return back();
    }
}
