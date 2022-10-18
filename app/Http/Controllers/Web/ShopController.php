<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Utilities\Helper;

class ShopController extends Controller
{
    public function shop()
    {
       
        // $request_query = request()->query('category');
        // //    dd('slksdj') ;
        // if (!empty($request_query)) {
        //     $categories_slug = explode(',', $request_query);
        //     $categories_ids = Category::whereIn('slug', $categories_slug)->pluck('id');
        //     $products = Product::whereIn('category_id', $categories_ids)->with('brand:id,title')->paginate(4);
        // } else {
        //     $products = Product::active()->with('brand:id,title')->paginate(4);
        // }
      
        //product-cate filter
        $request_category_query = request()->query('category');
        $categories_slug = explode(',', $request_category_query);
        $categories_ids = Category::whereIn('slug', $categories_slug)->pluck('id');
        //sortBy filter
        $request_sortBy_query = request()->query('sortBy') ;
        $request_sortBy_explode=explode('_',$request_sortBy_query) ?? null;
        $sortByOptions=['title', 'price', 'discount' ,'Asc', 'Desc']  ;
        //price_filter
        $request_query_price = explode('-',request()->query('price')) ?? null ;
        $request_query_price[0]=isset(($request_query_price[0]) ) ? ($request_query_price[0])  : Product::min('offer_price') ;
        $request_query_price[1]=isset(($request_query_price[1])) ? ($request_query_price[1]) : Product::max('offer_price') ;

        $products = Product::active()->when($request_category_query, function ($q) use ($categories_ids , $sortByOptions) {
            $q->whereIn('category_id', $categories_ids);
        })
        ->when(in_array($request_sortBy_explode[0], $sortByOptions) && in_array($request_sortBy_explode[1], $sortByOptions), function($query) use($request_sortBy_explode){
             $query->orderBy($request_sortBy_explode[0] , $request_sortBy_explode[1]);
        })
        ->when(request()->query('price') , function($q) use($request_query_price){
            $q->whereBetween('offer_price',$request_query_price);
        })
        ->with('brand:id,title')->paginate(20);

        $categories = Category::active()->get();
        return view('web.shop.shop', compact('products', 'categories'));
    }
    public function shopFilter(Request $request)
    {
    
        $categories = $request->category;
        $category_url = '';
        if(!empty($categories))
        {
            foreach ($categories as $category) {
                if (!empty($category_url)) {
                    $category_url .= ',' . $category;
                } else {
                    $category_url .= '&category=' . $category;
                }
            }
        }
        $sortBy_url = "";
        if(!empty($request->sortBy))
        {
            $sortBy_url .= '&sortBy=' . $request->sortBy ;
        }

        $price_url = "" ;
        if(!empty($request->price_range))
        {
            $price_url .='&price=' . $request->price_range ;
        }

// dd(explode('-',$request->price_range));
        return redirect()->route('shop', $category_url.$sortBy_url.$price_url);
    }
}
