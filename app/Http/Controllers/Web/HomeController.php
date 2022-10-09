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
        return view('web.pages.product-details', compact('product'));
    }
}
