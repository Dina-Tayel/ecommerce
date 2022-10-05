<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UserDataTable;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\userRequest;
use App\Models\Product;
use App\Models\User;

class UserController extends Controller
{
   
    public $userService ;

    public function __construct(UserService $userService)
    {
        $this->userService= $userService ;
    }

    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('backend.users.index');
    }

   
    public function create()
    {
        return view('backend.users.create');
    }

   
    public function store(userRequest $request)
    {
        // dd($request->validated());
        $this->userService->store($request->validated());
        return redirect()->route('users.index')->withSuccess('user is addedd successfully');
    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $user=User::find($id);
        return view('backend.users.edit',compact('user'));
    }


    public function update(userRequest $request, $id)
    {
        $this->userService->update($request->validated(), $id);
        return redirect()->route('users.index')->withSuccess('user is updated successfully!');
    }

    public function destroy($id)
    {

        $this->userService->destroy($id);
        return redirect()->back()->with('error', 'user is deleted successfully');
    }
    public function toggle($id)
    {
        $this->userService->toggle($id);
        return back();
    }
    
}
