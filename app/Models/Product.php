<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $append = ['image_path'] ;

    //acccesores and mutators
    public function getImagePathAttribute()
    {
        return  asset('uploads/products/' . $this->img);
    }

    //scopes
    public function scopeActive($query)
    {
        return $query->where('status','active');
    }

    //relationships
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->where('is_parent', 1);
    }

    public function child_ctas()
    {
        return $this->belongsTo(Category::class, 'child_cat_id', 'id');
    }

    public function brand()
    {
         return $this->belongsTo(Brand::class);
    }

    public function vendor()
    {
        return $this->belongsTo(User::class ,  'seller_id' , 'id')->where('role', 'seller');
    }

    
    // public function vendor()
    // {
    //     return $this->belongsTo(User::class , 'vendor_id' , 'id');
    // }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function related_projects()
    {
        return $this->hasMany(Product::class,'category_id' , 'category_id')->where('status','active')->limit(10);
    }

    
}
