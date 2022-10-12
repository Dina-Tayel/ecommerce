<?php 
namespace aPP\Services ;

use App\Repositories\ShippingRepository;

class ShippingService
{
    protected $shippingRepository ;

    public function __construct(shippingRepository $shippingRepository)
    {
        $this->shippingRepository = $shippingRepository ;
        
    }
    public function store($data)
    {
        return $this->shippingRepository->save($data ) ;
    }

    public function getShipping($id)
    {
        return $this->shippingRepository->getById($id);
    }

    public function update($data , $id)
    {
        $shipping=$this->getShipping($id);
        return $this->shippingRepository->update($shipping , $data) ;

    }
    public function destroy($id)
    {
        $shipping=$this->shippingRepository->getById($id);
        return $this->shippingRepository->delete($shipping);

    }

    public function toggle($id)
    {
        return $this->shippingRepository->toggle($id);

    }
}