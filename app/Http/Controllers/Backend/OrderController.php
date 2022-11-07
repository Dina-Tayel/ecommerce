<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // public $orderDataTable ;

    // public function __construct(OrderDataTable $orderDataTable)
    // {
    //     $this->orderDataTable = $orderDataTable ;
    // }

    public function index(OrderDataTable $orderDataTable)
    {
        return $orderDataTable->render('backend.orders.index');
    }
    public function show($id)
    {
        $order =Order::with('products')->find($id);
        return  view('backend.orders.show' , compact('order')) ;
    }
    public function orderStatus(Request $request)
    {
        $order=Order::find($request->id);
        foreach($order->products as $item)
        {
            $product =Product::where('id' , $item->pivot->product_id)->first();
            // dd($product);
            $product_stock = $item->stock;
            $product_stock -= $item->pivot->quantity ;
            $product->update(['stock'=>$product_stock]);
            $order->update(['payment_status'=>'paid']);
        }
        $order->update(['condition' =>$request->condition]);
        return back()->withSuccess('order is successfully updated !');
    }
    public function destroy($id)
    {
       $order=Order::find($id);
       $order->delete();

        return redirect()->route('order.index')->withError('order is deleted  successfully');
    }
}
