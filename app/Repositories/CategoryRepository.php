<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryRepository
{
    protected $category;
    
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function save($data)
    {
        $slug = Str::slug($data['title']);
        $slug_count = $this->category->where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = time() . '-' . $slug;
        }
        return $this->category->create(['slug' => $slug] + $data);
    }


    public function getById($id)
    {
        return $this->category->findOrFail($id);
    }

    public function getParentCategories()
    {
        return Category::select('id','title')->where('is_parent',1)->get();
    }
    
    public function update($category, $data)
    {
        // if (request()->is_parent == 1) {
        //     $data['parent_id'] = null;
        // }
        // if (request()->is_parent == 0) {
        //     $data['is_parent'] = 0;
        // }
        return $category->update($data);
    }

    public function delete($category)
    {
        $category_childs=$category->where('parent_id', $category->id)->pluck('id');
        if($category_childs->count() > 0)
        {
            // $category->whereIn('id',$category_childs)->update([
            //     'is_parent'=>1,
            // ]);
             Category::shiftChild($category_childs);
        }
        return $category->delete();

    }

    public function getParentCats()
    {
        return $this->category->where('is_parent', 1)->orderBy('title', 'Asc')->get();
    }

    public function toggle($id)
    {
        $category = $this->getById($id);
        $status = $category->status == 'active' ? 'inactive' : 'active';
        return $category->update([
            'status' => $status,
        ]);
    }
}
