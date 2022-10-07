<?php 

namespace App\Repositories ;

use App\Models\Coupon;

class CouponRepository 
{
    private $coupon ; 

    public function __construct(Coupon $coupon)
    {
        $this->coupon =$coupon ;
    }
    public function save($data)
    {
        // $slug=Str::slug($data['title']);
        // $slug_count=$this->coupon->where('slug' , $slug )->count();
        // if($slug_count > 0)
        // {
        //     $slug=  time() . '-' . $slug;
        // }
        // return $this->coupon->create(['slug' => $slug] + $data);
        return $this->coupon->create($data);
    }


    public function getById($id)
    {
        return $this->coupon->findOrFail($id);
    }

    public function update($coupon, $data)
    {
    
        return $coupon->update($data);
       
    }

    public function delete($coupon)
    {

       return $coupon->delete();
    }

    public function getCoupons()
    {
        return  $this->coupon->select('id','title')->get();
    }

    public function toggle($id)
    {
        $brand = $this->getById($id);
        $status = $brand->status == 'active' ? 'inactive' : 'active';
        return $brand->update([
            'status' => $status,
        ]);
       
    }
}