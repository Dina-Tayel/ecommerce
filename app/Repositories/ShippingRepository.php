<?php 

namespace App\Repositories ;

use App\Models\Shipping;

class ShippingRepository
{
    public $shipping;

    public function __construct(Shipping $shipping)
    {
        $this->shipping = $shipping;
    }

    public function save($data)
    {
        return $this->shipping->create($data);
    }


    public function getById($id)
    {
        return $this->shipping->findOrFail($id);
    }

    public function update($shipping, $data)
    {
        return $shipping->update($data);
    }

    public function delete($shipping)
    {
        return $shipping->delete();
    }

    public function toggle($id)
    {
        $shipping = $this->getById($id);
        $status = $shipping->status == 'active' ? 'inactive' : 'active';
        return $shipping->update([
            'status' => $status,
        ]);
    }

}