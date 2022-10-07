<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\couponDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CouponRequest;
use App\Services\couponService;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public $couponService;
    public function __construct(couponService $couponService)
    {
        $this->couponService = $couponService ;
    }
    public function index(couponDataTable $couponDataTable)
    {
        return $couponDataTable->render('backend.coupon.index');
    }

    public function create()
    {
        return view('backend.coupon.create');
    }


    public function store(CouponRequest $request)
    {
        $this->couponService->store($request->validated());
        return redirect()->route('coupon.index')->withSuccess('coupon is addedd successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $coupon = $this->couponService->getCoupon($id);
        return view('backend.coupon.edit', compact('coupon'));
    }


    public function update(CouponRequest $request, $id)
    {
        $this->couponService->update($request->validated(), $id);
        return redirect()->route('coupon.index')->withSuccess('coupon is updated  successfully');
    }


    public function destroy($id)
    {
        $this->couponService->destroy($id);
        return redirect()->route('coupon.index')->withError('coupon is deleted  successfully');
    }


    public function toggle($id)
    {
        $this->couponService->toggle($id);
        return back();
    }
}
