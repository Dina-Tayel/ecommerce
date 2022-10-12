<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ShippingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'shipping_address'=>'required|string|max:225',
            'shipping_time'=>'required|string|max:225',
            'shipping_charge'=>'required|numeric',
            'status'=>'required|in:active,inactive'
        ];
    }
}
