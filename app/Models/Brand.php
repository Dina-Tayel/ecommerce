<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $append=['image_path'] ;


    public function getImagePathAttribute()
    {
        return asset('uploads/brands/'.$this->img);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
