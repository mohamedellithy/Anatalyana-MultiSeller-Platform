<?php

namespace App\Http\Controllers\Seller;

use App\Models\Order;
use App\Models\Product;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
class ShippingController extends Controller
{
    public function all_products_shipping(Request $request)
    {
        return view('seller.shippings.all_products_shipping');
    }
}
