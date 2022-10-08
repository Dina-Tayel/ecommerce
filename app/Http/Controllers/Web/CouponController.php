<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function couponAdd(Request $request)
    {
        $code=$request->coupon ;
        $Coupon=Coupon::where('code',$code)->first();
        // dd($Coupon);
        if(! $Coupon)
            return back()->withError('coupon is expired');
        $total_price=Cart::instance('shopping')->subtotal();   
        session()->put('coupon',[
            'id'=>$Coupon->id,
            'code'=>$Coupon->code,
            'total_price'=>$Coupon->discount($total_price),
        ]);
        // dd( session()->get('coupon'));
        return back()->withSuccess('coupon is used successfully');
    }
}
