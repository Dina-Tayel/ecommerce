<?php 


namespace App\Services ;

use App\Models\Banner;
use App\Repositories\BannerRepository;
use App\Traits\MediaTrait;
use Illuminate\Support\Str;

class BannerService 
{
    use MediaTrait ;

    public $banner ;
    public $bannerRepository ;

    public function __construct(Banner $banner , BannerRepository $bannerRepository)
    {
        $this->banner=$banner ;
        $this->bannerRepository=$bannerRepository ;
    }
    public function store($data)
    {
        $data['img']= $this->uploadFile($data['img'] , 'uploads/banners/');
        return $this->bannerRepository->save($data ) ;
    }

    public function getBanner($id)
    {
        return $this->bannerRepository->getById($id);
    }

    public function update($data , $id)
    {
        $banner=$this->getBanner($id);
        if(!empty($data['img'])) {
            $this->deleteFile(public_path('uploads/banners/'.$banner->img));
        }
        $data['img'] = !(empty($data['img'])) ? $this->uploadFile($data['img'],'uploads/banners/') : $banner->img ;
        return $this->bannerRepository->update($banner , $data) ;

    }
    public function destroy($id)
    {
        $banner=$this->bannerRepository->getById($id);
        $this->deleteFile(public_path('uploads/banners/'.$banner->img));
        return $this->bannerRepository->delete($banner);

    }

    public function toggle($id)
    {
        return $this->bannerRepository->toggle($id);

    }

}
