<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function cart()
    {
        return view('web.pages.cart.index');
    }

    public function store(Request $request)
    {
        $product_qty = $request->quantity;
        $product_id = $request->input('product_id');
        $product = Product::where('id', $product_id)->get()->toArray();
        $price = $product[0]['offer_price'];
        // $product = Product::where('id',$product_id)->first();
        $cart_array=[] ;
        foreach (Cart::instance('shopping')->content() as $item) {
            $cart_array[] = $item->id;
        };
        // $result= Cart::instance('shopping')->add([
        //     ['id' => $product_id, 'name' => $product[0]['title'], 'qty' => 1, 'price' => $price ] ])->associate('Product');

        $result = Cart::instance('shopping')->add(
            $product_id,
            $product[0]['title'],
            1,
            $price,
            $product
        )->associate('App\Models\Product');

        // return Cart::count() ;

        // dd( Cart::instance('shopping')->content());
        if ($result) {
            $response['status'] = 'success';
            $response['product_id'] = $product_id;
            $response['total'] = Cart::subtotal();
            $response['cart_count'] = Cart::instance('shopping')->count();
            $response['message'] = 'item is addedd in your cart successfully';
        }

        //render the view with data
        //Sometimes, we use get html view layout from ajax request. 
        // At that you have to first render view file and then you need to store view in varibale and then
        //  we can return that varibale. 
        // In bellow example i render view with pass data
        if ($request->ajax()) {
            $header = view('web.layouts.header')->render();
        }
        $response['header'] = $header;
        // return json_encode($response);
        return $response;
    }

    public function delete(Request $request)
    {
        $rowId = $request->product_id;
        Cart::instance('shopping')->remove($rowId);
        // return $request->all();

        $response['status'] = 'success';
        $response['product_id'] = $rowId;
        $response['total'] = Cart::subtotal();
        $response['cart_count'] = Cart::instance('shopping')->count();
        $response['message'] = 'item is deleted in your cart successfully';
        if ($request->ajax()) {
            $header = view('web.layouts.header')->render();
            $cart_list = view('web.layouts._cart-list')->render();
            $response['header'] = $header;
            $response['cart_list'] = $cart_list;
        }
        return $response;
        // return json_encode($response);
    }

    public function update(Request $request)
    {

        $rowId = $request->row_id;
        $product_stock = $request->stock;
        $product_qty = $request->product_qty;
        if ($product_qty < 1) {
            $response['status'] = false;
            $message = 'You Cant add less than one item';
        } elseif ($product_qty > $product_stock) {
            $response['status'] = false;
            $message = 'You Cant add more items';
        } else {
            Cart::instance('shopping')->update($rowId, $product_qty);
            $response['status'] = true;

            $response['total'] = Cart::subtotal();
            $response['cart_count'] = Cart::instance('shopping')->count();

            $message = 'item is addedd successfully';
        }

        if ($request->ajax()) {
            $header = view('web.layouts.header')->render();
            $cart_list = view('web.layouts._cart-list')->render();
            $response['header'] = $header;
            $response['cart_list'] = $cart_list;
            $response['message'] = $message;
        }
        return $response;
    }
}
