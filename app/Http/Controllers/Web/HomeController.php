<?php

namespace App\Http\Controllers\Web;

use App\Models\Brand;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeController extends Controller
{
    public function home()
    {
        // Cart::instance('shopping')->destroy();
        // dd(Cart::instance('shopping')->content());
        // dd(Cart::instance('shopping')->count());
        $banners = Banner::activeandcondition()->get();
        $categories = Category::activeandparent()->orderBy('id', 'DESC')->limit(3)->get();
        $new_products = Product::with('brand')->active()->where('condition', 'new')->latest()->limit(10)->get();
        // dd($categories);
        return view('web.home', compact('banners', 'categories', 'new_products'));
    }

    public function categoryProducts(Category $category, Request $request)
    {
        // $route = 'products-cat';

        // $sort = $request->get('sort') ?? null;

        // if (!$category)
        //     return abort(404);

        // $products = Product::active()
        //     ->when($sort == 'titleAsc', function ($query) {
        //         $query->orderBy('title', 'ASC');
        //     })->when($sort == 'titleDesc', function ($query) {
        //         $query->orderBy('title', 'DESC');
        //     })->when($sort == 'priceAsc', function ($query) {
        //         $query->orderBy('price', 'ASC');
        //     })->when($sort == 'priceDesc', function ($query) {
        //         $query->orderBy('price', 'DESC');
        //     })->when($sort == 'discountAsc', function ($query) {
        //         $query->orderBy('discount', 'ASC');
        //     })->when($sort == 'discountDesc', function ($query) {
        //         $query->orderBy('discount', 'DESC');
        //     })
        //     ->where(['category_id' => $category->id])->get();

        // return view('web.pages.products.cat-products', compact('category', 'products', 'route'));
        $route = 'products-cat' ;
        $sort = $request->get('sort') ?? null ;
        $item = explode('_', $sort) ;
        $array = ['title', 'price', 'discount' ,'Asc', 'Desc'] ;
        if (in_array($item[0], $array) && in_array($item[1], $array)) {
            $products = Product::active()->when($request->has('sort'), function ($query) use ($item) {
                $query->orderBy($item[0], $item[1]);
            })->where(['category_id' => $category->id])->get();

        } else {
            $products = Product::active()->where(['category_id' => $category->id])->get();
        }
        return view('web.pages.products.cat-products', compact('category', 'products', 'route'));
    }

    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->with('images', 'related_projects')->latest()->first();
        $product_attributes = ProductAttribute::latest()->get();
        return view('web.pages.products.product-details', compact('product','product_attributes'));
    }

    public function autosearch(Request $request)
    {
        $query =$request->get('term' , '');
        // dd($query);
        $products =Product::where('title','like' , '%' . $query . '%')->get();
        $data =[];
        foreach($products as $product){
            $data[]=['value'=>$product->title , 'id'=>$product->id];
        }
        if(count($data))
        {
            return $data ;
        }else{
            return ['value'=>'no products found', 'id'=>''];
        }

    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('title' , 'like' , '%' .$query .'%' )->orderBy('id','DESC')->paginate(20) ;
        $categories = Category::active()->where('is_parent',1)->get();
        $brands = Brand::active()->with('products')->get();
        return view('web.shop.shop',compact('products', 'categories','brands'));

    }
}
