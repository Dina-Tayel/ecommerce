<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function discount($total_price)
    {
        if($this->type == 'fixed')
        {
            return $this->value ;
            dd('lkasdk');

        }elseif($this->type == 'percent'){
            // dd( ($this->value/100) * $total_price ) ;
            return ($this->value/100) * $total_price ;

        }else{
            return 0 ;
        }
    }
}
