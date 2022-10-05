<?php 

namespace App\Services ;

use App\Repositories\CategoryRepository;
use App\Traits\MediaTrait;

class CategoryService
{
    use MediaTrait ; 

    private $categoryRepository ;
     
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository ;
    }

    public function store($data)
    {
        if(isset($data['img']))
        {
            $data['img']= $this->uploadFile($data['img'] , 'uploads/categories/');
        }
        $data['is_parent'] =request()->input('is_parent', 0);
        return $this->categoryRepository->save($data);
    }

    public function getCategory($id)
    {
        return $this->categoryRepository->getById($id);
    }

    public function getParentCats()
    {
        return $this->categoryRepository->getParentCats();
         
    }

    public function update($data , $id)
    {
        $category=$this->getCategory($id);
        // iamge upload
        if(!empty($data['img'])) {
            $this->deleteFile(public_path('uploads/categories/'.$category->img));
        }
        $data['img'] = !(empty($data['img'])) ? $this->uploadFile($data['img'],'uploads/categories/') : $category->img ;
        //is-parent and parent-id part
        request()->is_parent == 1 ?  $data['parent_id'] = null : $data['is_parent'] = 0;
        // if (request()->is_parent == 1) {
        //     $data['parent_id'] = null;
        // }
        // if (request()->is_parent == 0) {
        //     $data['is_parent'] = 0;
        // }
        return $this->categoryRepository->update($category , $data);
    }
    public function destroy($id)
    {
        $category=$this->categoryRepository->getById($id);
        $this->deleteFile(public_path('uploads/categories/'.$category->img));
        return $this->categoryRepository->delete($category);
    }

    public function toggle($id)
    {
        return $this->categoryRepository->toggle($id);

    }
}