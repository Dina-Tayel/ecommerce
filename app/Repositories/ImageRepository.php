<?php

namespace App\Repositories;

use App\Models\Image;

class ImageRepository
{

    private $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function getAllProductImages($id)
    {
        return $this->image->where('product_id', $id)->get();
    }

    public function getById($id)
    {
        return $this->image->findOrFail($id);
    }

    public function save($image, $product_id)
    {
        $this->image->create(['img' => $image, 'product_id' => $product_id]);
    }

    public function update($image, $data)
    {

        return $image->update($data);
    }

    public function delete($image)
    {
        return  $image->delete();
    }
}
