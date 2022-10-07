<?php 

namespace App\Services ;

use App\Repositories\CouponRepository;
use App\Traits\MediaTrait;

class couponService
{

    use MediaTrait ;

    protected $couponRepository ;

    public function __construct( CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository ;
        
    }
    public function store($data)
    {
        return $this->couponRepository->save($data);
    }

    public function getCoupon($id)
    {
        return $this->couponRepository->getById($id);
    }

    public function update($data , $id)
    {
        $coupon=$this->getCoupon($id);
        return $this->couponRepository->update($coupon , $data);
    }
    public function destroy($id)
    {
        $coupon=$this->getCoupon($id);
        return $this->couponRepository->delete($coupon);
    }

    public function toggle($id)
    {
        
       return $this->couponRepository->toggle($id);
        
    }
}