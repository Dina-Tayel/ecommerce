<?php

namespace App\Http\Controllers\Backend;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ImageRequest;
use App\Models\Product;
use App\Services\ImageService;
use App\Traits\MediaTrait;

class ImageController extends Controller
{
    use MediaTrait;

    public $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function create()
    {
        $products = Product::select('title', 'id')->get();
        return view('backend.products.images.create-images', compact('products'));
    }

    public function store(ImageRequest $request)
    {
        $this->imageService->store($request->validated());
        return redirect()->route('products.create')->withSuccess('product images is uploaded successfully!');
    }

    public function show($id)
    {
        $images = $this->imageService->getAllProductImages($id);
        return view('backend.products.images.show-images', compact('images'));
    }

    public function edit($id)
    {
        $image = $this->imageService->getImage($id);
        return view('backend.products.images.edit-images', compact('image'));
    }

    public function update(ImageRequest $request, $id)
    {
        $this->imageService->update($request->validated(), $id);
        return back()->withSuccess('image is updated successfully');
    }

    public function destroy($id)
    {
        $this->imageService->destroy($id);
        return back()->withSuccess('image is deleted successfully');
    }
}
