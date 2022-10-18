<?php

namespace App\Http\Controllers\Web;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Utilities\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function shop()
    {
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
        //brand_filter
        $request_query_brand=explode(',',request()->query('brand')) ?? null;
        $brandIds= Brand::active()->whereIn('slug',$request_query_brand)->pluck('id');
        // return(Product::whereIn('brand_id',$brandIds)->get());
        $products = Product::active()->when($request_category_query, function ($q) use ($categories_ids , $sortByOptions) {
            $q->whereIn('category_id', $categories_ids);
        })
        ->when(in_array($request_sortBy_explode[0], $sortByOptions) && in_array($request_sortBy_explode[1], $sortByOptions), function($query) use($request_sortBy_explode){
             $query->orderBy($request_sortBy_explode[0] , $request_sortBy_explode[1]);
        })
        ->when($request_query_price , function($q) use($request_query_price){
            $q->whereBetween('offer_price',$request_query_price);
        })
        ->when(request()->query('brand') , function($q) use($brandIds){
            $q->whereIn('brand_id',$brandIds);
        })
        ->with('brand:id,title')->paginate(20);
// return $products ;
        $categories = Category::active()->with('products')->where('is_parent',1)->get();
        $brands = Brand::active()->with('products')->get();
        return view('web.shop.shop', compact('products', 'categories','brands'));
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
        //sortBy filter
        $sortBy_url = "";
        if(!empty($request->sortBy))
        {
            $sortBy_url .= '&sortBy=' . $request->sortBy ;
        }

        //price_filter
        $price_url = "" ;
        if(!empty($request->price_range))
        {
            $price_url .='&price=' . $request->price_range ;
        }

        //brands_filter
        $brands = $request->brand ;
        $brand_url ='' ;
        if(!empty($brands))
        {
            foreach($brands as $brand)
            {

                if(!empty($brand_url))
                {
                    $brand_url .= ',' . $brand ;
                }else{

                    $brand_url .= '&brand=' . $brand;
                }
            }

        }

// dd($brand_url);
// dd(explode('-',$request->price_range));
        return redirect()->route('shop', $category_url.$sortBy_url.$price_url.$brand_url);
    }
}
