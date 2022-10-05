<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'fullname'=>'required|string|max:225',
            'email'=>'required|email|unique:users,email',
            'username'=>'nullable|string|max:225',
            'address'=>'nullable|max:2000',
        ];
    }
}
