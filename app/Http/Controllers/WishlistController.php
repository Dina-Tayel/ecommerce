<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        return view('web.pages.wishlist.index');
    }

    public function wishlistStore(Request $request)
    {
        $product_id =$request->input('product_id');
        $product_qty = $request->input('product_qty');
        $product=Product::where('id',$product_id)->get()->toArray();
        $product_price=$product[0]['offer_price'];
        $wishlist_array= [];
        foreach(Cart::instance('wishlist')->content() as $item)
        {
            $wishlist_array[]= $item->id ;
        }
        if( in_array($product_id , $wishlist_array))
        {
            $response['present']=true ;
            $response['message']= 'this item is already found in your wishlist';

        }else{
            $response['status']=true ;
            $response['message']='This item is addedd successfully in your wishlist';
            Cart::instance('wishlist')->add( $product_id , $product[0]['title'] , $product_qty , $product_price)->associate('App\Models\Product');
            $response['wishlist_count']=Cart::instance('wishlist')->count();
            $header = view('web.layouts.header')->render();
            $response['header']=$header ;
        }
        return $response;

    }

    public function MoveToCart(Request $request)
    {
       $product = Cart::instance('wishlist')->get($request->input('rowId'));
       Cart::instance('wishlist')->remove($request->input('rowId'));
      $result = Cart::instance('shopping')->add($product->id , $product->name , 1 , $product->price )->associate('App\Models\Product');
      if($result)
      {
        $response['status']= true  ;
        $response['meassge']='This item is addedd in your cart successfully' ;
        $response['cart_count'] = Cart::instance('shopping')->count();
        $header = view('web.layouts.header')->render();
        $response['header'] = $header ;
      }
      return $response ;
    }

    public function wishlistDelete(Request $request)
    {
        Cart::instance('wishlist')->remove($request->input('rowId'));
        if($request->ajax()){
            $header = view('web.layouts.header')->render();
            $response['status']=true ;
            $response['message']='This item is removed successfully from your wishlist';
            $response['wishlist_count']=Cart::instance('wishlist')->count();
            $response['header']=$header ;
        }
        return $response ;

    }
}
