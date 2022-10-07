<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $banners = Banner::activeandcondition()->get();
        $categories = Category::activeandparent()->orderBy('id', 'DESC')->limit(3)->get();
        $new_products = Product::with('brand')->active()->where('condition', 'new')->latest()->limit(10)->get();
        // dd($categories);
        return view('web.home', compact('banners', 'categories', 'new_products'));
    }

    public function categoryProducts(Request $request , $slug)
    {
        // $category=Category::where(['slug'=>$slug])->with('products')->first();
        // $category = Category::where(['slug' => $slug])->with('products', function ($q) {
        //     $q->with('brand');
        // })->first();
        $category=Category::where(['slug'=>$slug])->with('products.brand')->first();
        $cat_id=$category->id ;
        $route='products-cat';
        abort_if($request->sort= null , 404);
        // dd( $request->sort );
        if($request->sort !=null)
        {
            $sort =request()->query('sort') ;
        }
        // dd($category) ;
        if($category == null)
        {
           return abort(404);
        }else{
            $sort =request()->query('sort') ;
            // dd(request()->query('sort'));
            if($sort == 'titleAsc')
            {
                $products =Product::where(['status'=>'active' ,'category_id'=>$cat_id])->orderBy('title','ASC')->get();
            }elseif($sort == 'titleDesc')
            {
                $products =Product::where(['status'=>'active' ,'category_id'=>$cat_id])->orderBy('title','DESC')->get();
            }elseif($sort == 'priceAsc')
            {
                $products =Product::where(['status'=>'active' ,'category_id'=>$cat_id])->orderBy('price','ASC')->get();
            }elseif($sort == 'priceDesc')
            {
                $products =Product::where(['status'=>'active' ,'category_id'=>$cat_id])->orderBy('price','DESC')->get();

            }elseif($sort == 'discountAsc')
            {
                $products =Product::where(['status'=>'active' ,'category_id'=>$cat_id])->orderBy('discount','ASC')->get();
            }elseif($sort == 'discountDesc')
            {
                $products =Product::where(['status'=>'active' ,'category_id'=>$cat_id])->orderBy('discount','DESC')->get();
            }else{
                $products =Product::where(['status'=>'active' , 'category_id'=>$cat_id])->get();
            }
        }
        // return $products ;
        return view('web.pages.products.cat-products', compact('category','products','route'));
    }

    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->with('images', 'related_projects')->latest()->first();
        return view('web.pages.product-details', compact('product'));
    }
}
