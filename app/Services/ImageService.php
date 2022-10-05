<?php

namespace App\Services;

use App\Models\Image;
use App\Repositories\ImageRepository;
use App\Traits\MediaTrait;

class ImageService
{
    use MediaTrait;
    protected $imageRepository;
    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function getAllProductImages($id)
    {
        return $this->imageRepository->getAllProductImages($id);
    }

    public function store($data)
    {
        $product_id = $data['product_id'];
        foreach ($data['img'] as $image) {
            $image = $this->uploadFile($image, 'uploads/products/images/');
            $this->imageRepository->save($image, $product_id);
        }
    }

    public function getImage($id)
    {
        return $this->imageRepository->getById($id);
    }

    public function update($data, $id)
    {
        $image = $this->getImage($id);
        if (!empty($data['img'])) {
            $this->deleteFile(public_path('uploads/products/images/' . $image->img));
        }
        $data['img'] = !(empty($data['img'])) ? $this->uploadFile($data['img'], 'uploads/products/images/') : $image->img;
        return $this->imageRepository->update($image, $data);
    }

    public function destroy($id)
    {
        $image = $this->getImage($id);
        $this->deleteFile(public_path('uploads/products/' . $image->img));
        return $this->imageRepository->delete($image);
    }
}
