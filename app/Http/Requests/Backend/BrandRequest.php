<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

   public function onCreate()
   {

    return [
        'title'=>'nullable|string|max:225',
        'img'=>'required|image|mimes:png,jpg,jpeg,gif',
        'status'=>'required|in:active,inactive' ,
    ] ;
    
   }

   public function onUpdate()
   {

    return [
        'title'=>'nullable|string|max:225',
        'img'=>'nullable|image|mimes:png,jpg,jpeg,gif',
        'status'=>'required|in:active,inactive' ,
    ] ;
    
   }
    public function rules()
    {
        return request()->isMethod('post') ? $this->onCreate() : $this->onUpdate() ;

    }
}
