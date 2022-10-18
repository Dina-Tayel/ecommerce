<?php

namespace App\Http\Controllers\Web;

use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\Web\Checkout1Request;
use App\Mail\OrderResponseMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();
        return view('web.pages.checkout.checkout1', compact('user'));
    }
    public function checkout1Store(Checkout1Request $request)
    {

        session()->put('checkout1', [
            'fname' => $request->first_name,
            'lname' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'state' => $request->state,
            'address' => $request->address,
            'postcode' => $request->postcode,
            'note' => $request->note,
            'sfname' => $request->sfirst_name,
            'slname' => $request->slast_name,
            'sphone' => $request->sphone,
            'scountry' => $request->scountry,
            'scity' => $request->scity,
            'sstate' => $request->sstate,
            'saddress' => $request->saddress,
            'spostcode' => $request->spostcode,
            'subtotal' => Cart::instance('shopping')->subtotal(),
            'total' => Cart::instance('shopping')->total(),
        ]);
        $shipping = Shipping::where('status', 'active')->get();
        return view('web.pages.checkout.checkout2', compact('shipping'));
    }

    public function checkout2Store(Request $request)
    {
        if (session()->has('previous_page')) {
            // $checkout1 = Session::get('checkout1'); // Get the array
            // unset($checkout1[1]);
            // unset($checkout1[0]);

        }
        // $request->validate([
        //     'shipping_charge' => 'required|numeric',
        // ]);
       session()->put('sharge',[
        'delivery_charge' => $request->shipping_charge,
            'payment_status' => 'paid',
      ]);
        // session()->push('checkout1', [
        //     'delivery_charge' => $request->shipping_charge,
        //     'payment_status' => 'paid',
        // ]);
        return view('web.pages.checkout.checkout3');
    }

    public function checkout3Store(Request $request)
    {
        
        // if (session()->has('previous_page')) {
            // $checkout1 = Session::get('checkout1'); // Get the array
            // unset($checkout1[1]);
            // unset($checkout1[0]);

        // }

        // $request->validate([
        //     'payment_method'=>'required|numeric',
        // 'paymetn_status'=>'string|un:paid,inpaid'
        // ]);
       
        session()->push('sharge', ['payment_method' => $request->payment_method]);      
        return view('web.pages.checkout.checkout4');
    }

    public function confirm(Request $request)
    {
        session()->put('previous_page', 'checkout3Store');
        $coupon = session()->has('coupon') ? session()->get('checkout1') : 0;
        if (session()->has('coupon')  && empty(session()->has('checkout1'))) {
            $total_amount = number_format(str_replace(',', '', Cart::subtotal()) - session()->get('coupon')['value'], 2);
        } elseif (session()->has('checkout1') && empty(session()->has('coupon'))) {

            $total_amount =  number_format(str_replace(',', '', Cart::subtotal()) + session()->get('sharge')['delivery_charge'], 2);
        } elseif (session()->has('coupon') && session()->has('checkout1')) {

            $total_amount =  number_format(str_replace(',', '', Cart::subtotal()) + session()->get('sharge')['delivery_charge'] -  session()->get('coupon')['value'], 2);
        } else {

            $total_amount =  number_format(str_replace(',', '', Cart::subtotal()), 2);
        }
        $data=['user_name'=>Auth::user()->fullname , 'total_amount'=>$total_amount] ;
        // Mail::to('dinatayel913@gmail.com')->send(new OrderResponseMail($data));
        // dd('send successfully');
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'order_number' => Str::upper('ORD-' . Str::random(10)),
            "subtotal" => str_replace(',', '', Cart::subtotal()),
            'total_amount' => $total_amount,
            'coupon' => $coupon,
            'delivary_charge' => session()->get('sharge')['delivery_charge'], 
            'payment_status' => session()->get('sharge')['payment_status'],
            'payment_method' => session()->get('sharge')[0]["payment_method"],
            'condition' => 'pending',
            "first_name" => session()->get('checkout1')['fname'],
            "last_name" => session()->get('checkout1')['lname'],
            "email" => session()->get('checkout1')['email'],
            "phone" => session()->get('checkout1')['phone'],
            "country" => session()->get('checkout1')['country'],
            "city" => session()->get('checkout1')['city'],
            "state" => session()->get('checkout1')['state'],
            "address" => session()->get('checkout1')['address'],
            "postcode" => session()->get('checkout1')['postcode'],
            "note" => session()->get('checkout1')['note'],
            "sfirst_name" => session()->get('checkout1')['sfname'],
            "slast_name" => session()->get('checkout1')['slname'],
            "sphone" => session()->get('checkout1')['sphone'],
            "scountry" => session()->get('checkout1')['scountry'],
            "scity" => session()->get('checkout1')['scity'],
            "sstate" => session()->get('checkout1')['sstate'],
            "saddress" => session()->get('checkout1')['saddress'],
            "spostcode" =>  session()->get('checkout1')['spostcode'],
        ]);
        if ($order) {
            Cart::instance('shopping')->destroy();
            Session::forget('coupon');
            Session::forget('checkout1');
            return redirect()->route('checkout.complete', $order->order_number);
        }
    }

    public function complete($order_number)
    {
        return view('web.pages.checkout.checkout-complete', compact('order_number'));
    }
}
