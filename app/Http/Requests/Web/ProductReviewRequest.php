<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class ProductReviewRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        return [
            'user_id' =>'required|exists:users,id',
            'product_id'=>'required|exists:products,id' ,
            'rate'=>'required|numeric' ,
            'review'=>'required|max:3000',
            'reason'=>'required',
            // 'status'=>'required|in:pending,accept,reject'            
        ];
    }
}
