<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'is_parent'=> request()->input('is_parent'),
            'parent_id'=>request()->input('parent_id'),
        ]);
    }

    public function onCreate()
    {
        return [
            'title'=>'required|string|max:225',
            'desc'=>'nullable|max:3000',
            'status'=>'nullable|in:active,inactive',
            'img'=>'nullable|image|mimes:png,jpg,jpeg,gif',
            'is_parent'=>'sometimes' ,
            // 'parent_id'=>'required_if:is_parent,null',
            'parent_id'=>'nullable|exists:categories,id',
        ];
         
    }

    public function onUpdate()
    {
         return [
            'title'=>'required|string|max:225',
            'desc'=>'nullable|max:3000',
            'status'=>'nullable|in:active,inactive',
            'img'=>'nullable|image|mimes:png,jpg,jpeg,gif',
            'is_parent'=>'sometimes' ,
            // 'parent_id'=>'required_if:is_parent,null',
            'parent_id'=>'nullable|exists:categories,id',
         ];
    }
    public function rules()
    {
        return request()->isMethod('post') ? $this->onCreate() : $this->onUpdate();
         
    }
}
