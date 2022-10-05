<?php 

namespace App\Services;

use App\Repositories\BrandRepository;
use App\Traits\MediaTrait;

class BrandService
{
    
    use MediaTrait ;

    protected $brandRepository ;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository ;
        
    }
    public function store($data)
    {
        $data['img']=$this->uploadFile($data['img'] , 'uploads/brands/');
        return $this->brandRepository->save($data);
    }

    public function getBrand($id)
    {

        return $this->brandRepository->getById($id);

    }

   
    public function update($data , $id)
    {
        $brand=$this->getBrand($id);
        if(!empty($data['img'])) {
            $this->deleteFile(public_path('uploads/brands/'.$brand->img));
        }
        $data['img'] = !(empty($data['img'])) ? $this->uploadFile($data['img'],'uploads/brands/') : $brand->img ;
        return $this->brandRepository->update($brand , $data);
    }
    public function destroy($id)
    {
        $brand=$this->getBrand($id);
        $this->deleteFile(public_path('uploads/brands/'. $brand->img));
        return $this->brandRepository->delete($brand);
    }

    public function toggle($id)
    {
        
       return $this->brandRepository->toggle($id);
        
    }
}