<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CategoryDataTable;
use App\Http\Requests\Backend\CategoryRequest;
use App\Services\CategoryService;
use COM;

class CategoryController extends Controller
{

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index(CategoryDataTable $categoryDataTable)
    {
        return $categoryDataTable->render('backend.categories.index');
    }


    public function create()
    {
        $parent_cats = $this->categoryService->getParentCats();
        return view('backend.categories.create', compact('parent_cats'));
    }


    public function store(CategoryRequest $request)
    {
        // $data=$request->all();
        // $data['is_parent'] = $request->input('is_parent');
        // if($request->is_parent==1) {
        //     $data['parent_id'] = null;
        // }
        // dd($request);

        $this->categoryService->store($request->validated());
        return redirect()->route('categories.index')->withSuccess('category is added successfully');
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
        $parent_cats = $this->categoryService->getParentCats();
        $category = $this->categoryService->getCategory($id);
        return view('backend.categories.edit', compact('category', 'parent_cats'));
    }

    public function update(CategoryRequest $request, $id)
    {
        // $data=$request->all();
        // // $data['is_parent'] = $request->input('is_parent',0);
        // if($request->is_parent==1) {
        //     $data['parent_id'] = null;
        // }
        // if($request->is_parent==0) {
        //     $data['is_parent'] = 0;
        // }
        // dd($data);
        $this->categoryService->update($request->validated(), $id);
        return redirect()->route('categories.index')->withSuccess('Category is updated successfully!');
    }

    public function destroy($id)
    {

        $this->categoryService->destroy($id);
        return redirect()->back()->with('error', 'category is deleted successfully');
    }
    public function toggle($id)
    {
        $this->categoryService->toggle($id);
        return back();
    }

    // public function getChildByParentId(Request $request, $id)
    // {
    //     return response()->json('kjhsid');
    // }
}
