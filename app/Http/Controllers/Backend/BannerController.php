<?php

namespace App\Http\Controllers\Backend;

use Datatables;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\DataTables\BannerDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BannerRequest;
use App\Services\BannerService;
use App\Traits\MediaTrait;

class BannerController extends Controller
{
    
    use MediaTrait ; 

    protected $bannerService ;

    public function __construct(BannerService $bannerService)
    {
        $this->bannerService= $bannerService ;
    }

    public function index(BannerDataTable $bannerDataTable)
    {
         return $bannerDataTable->render('backend.banners.index');
        
    }

    public function create()
    {
        return view('backend.banners.create');
    }

    public function store(BannerRequest $request)
    {
        $this->bannerService->store($request->validated());
        return redirect()->route('banners.index')->withSuccess('data is adddedd successfully!');
    }

    public function toggle($id)
    {
        $this->bannerService->toggle($id);
        return back();
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $banner=$this->bannerService->getBanner($id);
        return view('backend.banners.edit', compact('banner'));
    }


    public function update(BannerRequest $request, $id)
    {
         $this->bannerService->update($request->validated() , $id);
        return redirect()->route('banners.index')->withSuccess('data is updated successfully!');

    }

    public function destroy($id)
    {
        $this->bannerService->destroy($id);
        return redirect()->back()->with('error','banner is deleted successfully');
    }
        // public function index(Request $request)
    // {
    //     //  return $bannerDataTable->render('backend.banners.index');
    //     if ($request->ajax()) {
    //         $data = Banner::select('*');
    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function ($row) {
    //                 $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>
    //                        <a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
    //                 return $btn;
    //             })
                
    //             // ->addColumn('image' , function($row){
    //             //     return '<img src="'. asset("uploads/$row->img" ) .'" width="50px" >' ;
    //             // })
    //             ->rawColumns(['action','image'])
    //             ->make(true);
    //     }
    //     return view('backend.banners.index');
    // }
    // public function getAllBanners()
    // {
    //     $categories = Banner::get();
    //     return DataTable::of(Banner::auery())->make(true);
    // }
}
