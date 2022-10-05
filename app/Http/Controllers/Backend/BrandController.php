<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BrandRequest;
use App\Services\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{



    public $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index(BrandDataTable $branddatatable)
    {
        return $branddatatable->render('backend.brands.index');
    }


    public function create()
    {
        return view('backend.brands.create');
    }


    public function store(BrandRequest $request)
    {
        $this->brandService->store($request->validated());
        return redirect()->route('brands.index')->withSuccess('brand is addedd successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $brand = $this->brandService->getBrand($id);
        return view('backend.brands.edit', compact('brand'));
    }


    public function update(BrandRequest $request, $id)
    {
        $this->brandService->update($request->validated(), $id);
        return redirect()->route('brands.index')->withSuccess('brand is updated  successfully');
    }


    public function destroy($id)
    {
        $this->brandService->destroy($id);
        return redirect()->route('brands.index')->withError('brand is deleted  successfully');
    }


    public function toggle($id)
    {
        $this->brandService->toggle($id);
        return back();
    }

}
