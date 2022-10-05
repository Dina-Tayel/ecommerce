<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'fullname'=>'required|string|max:225',
            'username'=>'nullable|string|max:225',
            'email'=>'required|email|unique:users,email',
            'phone'=>'nullable|numeric|min:10',
            'password'=>'required|string|max:225',
            'address'=>'nullable|string',
            'img'=>'nullable|image|mimes:png,jpg,jpeg,gif',
            'role'=>'required|in:admin,vendor,customer'
        ];
    }

    public function onUpdate()
    {
        return [
            'fullname'=>'required|string|max:225',
            'username'=>'nullable|string|max:225',
            'email' => 'required|email|unique:users,email,' . $this->user,
            'phone'=>'nullable|numeric|min:10',
            'password'=>'nullable|string|max:225',
            'address'=>'nullable|string',
            'img'=>'nullable|image|mimes:png,jpg,jpeg,gif',
            'role'=>'required|in:admin,vendor,customer'
        ];
    }

    public function rules()
    {
       return request()->isMethod('post') ? $this->onCreate() : $this->onUpdate() ;
    }
}
