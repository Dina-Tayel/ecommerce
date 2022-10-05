<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateUserPassword extends Controller
{
    public function update(Request $request)
    {
        // if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
        //     // The passwords matches
        //     return redirect()->back()->with("error","Your current password does not matches with the password.");
        // }
        $request->validate([
            'current_password' => ['required',new MatchOldPassword],
            'password' => ['required'],
            'password_confirmation' => ['same:password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);
        return back()->with('status','password-updated');

    }
    
  
}
