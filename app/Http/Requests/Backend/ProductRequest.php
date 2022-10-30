<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'child_cat_id' => request()->input('child_cat_id'),
        ]);
    }

    public function onCreate()
    {
        return [
            'title' => 'required|string|max:225',
            'summary' => 'required|string',
            'desc' => 'nullable|string',
            'return_cancellation' => 'nullable|string|max:40000',
            'additional_info' => 'nullable|string|max:40000',
            // 'img' => 'required',
            'img' => 'required|image|mimes:png,jpg,jpeg,gif',
            'size_guide' => 'nullable',
            'size_guide.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048',
            'price' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'stock' => 'nullable|numeric',
            'size' => 'required|in:L,S,M,XL',
            'seller_id' => 'required|exists:users,id',
            'brand_id' => 'required|exists:brands,id',
            'status' => 'nullable|in:active,inactive',
            'condition' => 'nullable|in:new,popular,winter',
            'category_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
        ];
    }

    public function onUpdate()
    {
        return [
            'title' => 'required|string|max:225',
            'summary' => 'required|string',
            'desc' => 'nullable|string',
            'return_cancellation' => 'nullable|string|max:40000',
            'additional_info' => 'nullable|string|max:40000',
            'img' => 'nullable|image|mimes:png,jpg,jpeg,gif', 
            'size_guide' => 'nullable',
            'size_guide.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048',
            'price' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'stock' => 'nullable|numeric',
            'size' => 'required|in:L,S,M,XL',
            'seller_id' => 'required|exists:users,id',
            'brand_id' => 'required|exists:brands,id',
            'status' => 'nullable|in:active,inactive',
            'condition' => 'nullable|in:new,popular,winter',
            'category_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
        ];
    }
    public function rules()
    {
        return request()->isMethod('post') ? $this->onCreate() : $this->onUpdate();
    }
}
