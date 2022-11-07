<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ShippingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ShippingRequest;
use App\Services\ShippingService;

use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public $shippingService ; 

    public function __construct(ShippingService $shippingService)
    {
        $this->shippingService = $shippingService ;

    }
    public function index(ShippingDataTable $shippingDataTable)
    {
        return $shippingDataTable->render('backend.shipping.index');
    }

    public function create()
    {
        return view('backend.shipping.create');
    }


    public function store(ShippingRequest $request)
    {
        $this->shippingService->store($request->validated());
        return redirect()->route('shipping.index')->withSuccess('shipping is addedd successfully');
    }

    public function edit($id)
    {
        $shipping = $this->shippingService->getShipping($id);
        return view('backend.shipping.edit', compact('shipping'));
    }


    public function update(ShippingRequest $request, $id)
    {
        $this->shippingService->update($request->validated(), $id);
        return redirect()->route('shipping.index')->withSuccess('shipping is updated  successfully');
    }


    public function destroy($id)
    {
        $this->shippingService->destroy($id);
        return redirect()->route('shipping.index')->withError('shipping is deleted  successfully');
    }


    public function toggle($id)
    {
        $this->shippingService->toggle($id);
        return back();
    }

}
