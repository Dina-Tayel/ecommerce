<?php 

namespace App\Repositories;

use App\Models\Brand;
use Illuminate\Support\Str;

class BrandRepository
{

    private $brand ; 

    public function __construct(Brand $brand)
    {
        $this->brand =$brand ;
    }
    public function save($data)
    {
        $slug=Str::slug($data['title']);
        $slug_count=$this->brand->where('slug' , $slug )->count();
        if($slug_count > 0)
        {
            $slug=  time() . '-' . $slug;
        }
        return $this->brand->create(['slug' => $slug] + $data);
    }


    public function getById($id)
    {
        return $this->brand->findOrFail($id);
    }

    public function update($brand, $data)
    {
    
        return $brand->update($data);
       
    }

    public function delete($brand)
    {

       return $brand->delete();
    }

    public function getBrands()
    {
        return Brand::select('id','title')->get();
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