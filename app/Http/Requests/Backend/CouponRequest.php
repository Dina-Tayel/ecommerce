<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code'=>'required|unique:coupons,code|min:3',
            'value'=>'required|numeric',
            'type'=>'required|in:fixed,percent',
            'status'=>'required|in:active,inactive' ,
        ];
    }
}
