<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'title'=>'required|string|max:225',
            'desc'=>'nullable|max:5000',
            'img'=>'required|image|mimes:png,jpg,gif,jpeg|max:2028',
            'status'=>'required|string|in:active,inactive',
            'conditions'=>'required|string|in:banner,promo',
        ];
    }

    public function onUpdate()
    {
        return[
            'title'=>'required|string|max:225',
            'desc'=>'nullable|max:5000',
            'img'=>'image|mimes:png,jpg,gif,jpeg|max:2028',
            'status'=>'required|string',
            'conditions'=>'required|string',
        ];
    }
    public function rules()
    {
       return request()->isMethod('post') ? $this->onCreate() : $this->onUpdate() ;
    }
}
