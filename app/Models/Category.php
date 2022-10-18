<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $append = ['image_path'] ;

    public function getImagePathAttribute()
    {
        return  asset('uploads/categories/' . $this->img);
    }

    public function scopeActive($query)
    {
        return $query->where('status','active');
    }

    protected static function shiftChild($category_childs_id)
    {
        return Category::whereIn('id',$category_childs_id)->update([
                'is_parent'=>1,
            ]);
    }

    
    public static function getChildByParentId($id)
    {
        return Category::where('parent_id', $id)->pluck('title','id');
    
    }
   
    //local scope
    public function scopeActiveAndParent($query)
    {
        return  $query->where(['status'=>'active' , 'is_parent'=>1]);
    }

    //relationships
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
}
