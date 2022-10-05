<?php


namespace App\Services;

use App\Models\Product;
use App\Traits\MediaTrait;
use Illuminate\Support\Str;
use App\Repositories\ProductRepository;

class ProductService
{
    use MediaTrait;

    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function store($data)
    {
        $data['img']= $this->uploadFile($data['img'] , 'uploads/products/');
        $data['offer_price']=( $data['price'] - (($data['discount']/100)*100)) ;
        return $this->productRepository->save($data);
       
    }

    public function getProduct($id)
    {
        return $this->productRepository->getById($id);
    }


    public function getVendors()
    {
        return $this->productRepository->getVendors();
    }

    public function update($data, $id)
    {

        $product = $this->getProduct($id);
        // iamge upload
        if (!empty($data['img'])) {
            $this->deleteFile(public_path('uploads/products/' . $product->img));
        }
        $data['img'] = !(empty($data['img'])) ? $this->uploadFile($data['img'], 'uploads/products/') : $product->img;
        $data['offer_price'] = ($data['price'] - (($data['discount'] / 100) * 100));

        return $this->productRepository->update($product, $data);
    }
    public function destroy($id)
    {
        $product = $this->getProduct($id);
        $this->deleteFile(public_path('uploads/products/' . $product->img));
        return $this->productRepository->delete($product);
    }

    public function toggle($id)
    {
        return $this->productRepository->toggle($id);
    }
}
