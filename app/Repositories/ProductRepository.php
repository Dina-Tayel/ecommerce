<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductRepository
{

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function save($data)
    {
        $slug = Str::slug($data['title']);
        $slug_count = $this->product->where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = time() . '-' . $slug;
        }
        return $this->product->create(['slug' => $slug] + $data);
    }

    
    public function getById($id)
    {

        return $this->product->findOrFail($id);
    }

    public function update($product, $data)
    {

        return $product->update($data);
    }

    public function delete($product)
    {
        return  $product->delete();
    }



    public function getVendors()
    {
        return User::where('role', 'seller')->select('id', 'fullname')->get();
    }
    public function toggle($id)
    {
        $product = $this->getById($id);
        $status = $product->status == 'active' ? 'inactive' : 'active';
        return $product->update([
            'status' => $status,
        ]);
    }
}
