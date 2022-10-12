<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class Checkout1Request extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name'=>'required|string|max:225',
            'last_name'=>'required|string|max:225',
            'email'=>'required|email|unique:users,email,' . $this->user,
            'phone'=>'required|numeric',
            'country'=>'required|string|max:225',
            'state'=>'required|string|max:225',
            'address'=>'required|string|max:2000',
            'postcode'=>'required|numeric',
            'sfirst_name'=>'required|string|max:225',
            'slast_name'=>'required|string|max:225',
            'sphone'=>'required|numeric',
            'scountry'=>'required|string|max:225',
            'sstate'=>'required|string|max:225',
            'saddress'=>'required|string|max:2000',
            'spostcode'=>'required|numeric',
        ];
    }
}
