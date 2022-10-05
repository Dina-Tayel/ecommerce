<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $guarded=[] ;

    protected $append=['image_path'] ;


    public function getImagePathAttribute()
    {
        return asset('uploads/banners/'.$this->img);
    }
    
    public function scopeActiveAndCondition($query)
    {
        return $query->where('status','active')->where('conditions','banner');
    }
}
