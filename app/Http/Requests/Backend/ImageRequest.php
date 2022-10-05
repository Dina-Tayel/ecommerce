<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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

    public function onCreate()
    {
        return [

            'img' => 'required',
            'img.*'=>'image|mimes:png,jpg,jpeg,gif',
            'product_id'=>'required|exists:products,id'
           
        ];
    }

    public function onUpdate()
    {
        return [
            'img' => 'image|mimes:png,jpg,jpeg,gif',
            // 'img.*'=>'image|mimes:png,jpg,jpeg,gif',
            // 'product_id'=>'required|exists:products,id'

        ];
    }
    public function rules()
    {
       return request()->isMethod('post') ? $this->onCreate() : $this->onUpdate() ;
    }
}
