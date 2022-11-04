<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ProductReviewRequest;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class productReviewController extends Controller
{
    public function productReview(ProductReviewRequest $request)
    {
        ProductReview::create($request->validated());
        return response()->json(['success'=>'Thanks for your review!']);
    }
}
