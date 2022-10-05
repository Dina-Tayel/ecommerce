<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use App\Traits\MediaTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Http\Requests\Backend\ProductRequest;
use App\Models\Image;

class ProductController extends Controller
{
    use MediaTrait;

    public $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index(ProductDataTable $productDataTable)
    {
        // $data = Product::select('*')->with(['brand','vendor','category','child_ctas'])->get();
        // foreach($data as $d)
        // {
        //     dd($d->category) ;
        // }
        return $productDataTable->render('backend.products.index');
        //    $products = Product::with('category')->find(1);
        //    $products = Product::with('child_ctas')->find(1);
        //    return($products);

    }

    public function getChildByParentId(Request $request, $id)
    {
        $category = app(CategoryRepository::class)->getById($id);
        $child_cats = Category::getChildByParentId($request->id);
        $child_cats_count = count($child_cats);
        if ($child_cats_count <= 0) {
            return response()->json(['status' => false, 'data' => null]);
        } else {
            return response()->json(['status' => true, 'data' => $child_cats]);
        }
    }
    public function create()
    {
        $brands = app(BrandRepository::class)->getBrands();
        $categories = app(CategoryRepository::class)->getParentCategories();
        $vendors = $this->productService->getVendors();
        return view('backend.products.create', compact('brands', 'categories', 'vendors'));
    }


    public function store(ProductRequest $request)
    {
  
        $this->productService->store($request->validated());
        return redirect()->route('products.index')->withSuccess('ptoduct is addedd successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $product = $this->productService->getProduct($id);
        $brands = app(BrandRepository::class)->getBrands();
        $categories = app(CategoryRepository::class)->getParentCategories();
        $vendors = $this->productService->getVendors();
        return view('backend.products.edit', compact('product', 'brands', 'categories', 'vendors'));
    }


    public function update(ProductRequest $request, $id)
    {
        $this->productService->update($request->validated(), $id);
        return redirect()->route('products.index')->withSuccess('product is updated successfully!');
    }


    public function destroy($id)
    {
        $this->productService->destroy($id);
        return back()->withError('product is deleted successfully');
    }

    public function toggle($id)
    {
        $this->productService->toggle($id);
        return back();
    }

   
}
