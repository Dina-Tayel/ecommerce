<?php

namespace App\Repositories;

use App\Models\Banner;
use Illuminate\Support\Str;

class BannerRepository
{

    public $banner;

    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    public function save($data)
    {
        $slug = Str::slug($data['title']);
        $slug_count = $this->banner->where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = time() . '-' . $slug;
        }
        return $this->banner->create(['slug' => $slug] + $data);
    }


    public function getById($id)
    {
        return $this->banner->findOrFail($id);
    }

    public function update($banner, $data)
    {
        return $banner->update($data);
    }

    public function delete($banner)
    {
        return $banner->delete();
    }

    public function toggle($id)
    {
        $banner = $this->getById($id);
        $status = $banner->status == 'active' ? 'inactive' : 'active';
        return $banner->update([
            'status' => $status,
        ]);
    }
}
