<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $append = ['image_path'];

    public function getImagePathAttribute()
    {
        return  asset('uploads/products/images/' . $this->img);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
