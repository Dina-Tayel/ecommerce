<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\MatchOldPassword;
use App\Traits\MediaTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use MediaTrait ;
    public function userDashboard()
    {
        return view('web.user.dashboard');

    }

    public function userOrder()
    {
        return view('web.user.orders');
    }

    public function userAddress()
    {
        return view('web.user.address');
    }

    public function billingAddress(Request $request , $id)
    {
        $request->validate([
            'address'=>'required|string|max:2000',
            'country'=>'required|string|max:225',
            'city'=>'required|string|max:225',
            'state'=>'required|string',
            'postcode'=>'required|numeric',
        ]);
        $user =User::find($id);
        $user->update([
            'address'=>$request->address,
            'country'=>$request->country,
            'city'=>$request->city ,
            'state'=>$request->state ,
            'postcode'=>$request->postcode,
        ]);
        return response()->json(['success'=>true , 'success'=>'your billimg address is updated successfully']) ;

    }

    public function shippingAddress(Request $request , $id)
    {
        $request->validate([
            'saddress'=>'required|string|max:2000',
            'scountry'=>'required|string|max:225',
            'scity'=>'required|string|max:225',
            'sstate'=>'required|string',
            'spostcode'=>'required|numeric',
        ]);
        $user =User::find($id);
        $user->update([
            'saddress'=>$request->saddress,
            'scountry'=>$request->scountry,
            'scity'=>$request->scity ,
            'sstate'=>$request->sstate ,
            'spostcode'=>$request->spostcode,
        ]);
        return response()->json(['success'=>true , 'success'=>'your shipping adddress is updated successfully']) ;
    }

    public function userAcccount()
    {
        return view('web.user.account');
    }

    public function updateAcccount(Request $request)
    {
        $request->validate([
            'fullname'=>'required|string|max:225',
            'username'=>'nullable|string|max:225',
            'phone'=>'nullable|numeric',
            'img'=>'nullable|image|mimes:png,jpg',
            'current_password'=>['nullable','required_with:newPass' , new MatchOldPassword() ],
            'newPass'=>['required_with:current_password','sometimes'],
            'newPass_confirmation' => ['same:newPass','required_with:newPass'],
        ], [
            'confirm_password.required_with' => 'Confirm password is required.'
        ]); 
        $image = (!empty($request->img)) ?  $this->uploadFile($request->img , 'uploads/users/') : auth()->user()->img ;
        $password = (!empty($request->newPass)) ? Hash::make($request->newPass) : auth()->user()->password ; 
        if(!empty($request->img)) {
            $this->deleteFile(public_path('uploads/users/'.$request->img));
        }
        Auth::user()->update(['password'=>$password , 'img'=>$image] + $request->all());
        return redirect()->back()->withSuccess('profile is updated successfully');
    }
}
