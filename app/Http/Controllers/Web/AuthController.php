<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('web.auth.login');
    }

    public function loginSubmit(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            Session::put('user', $request->email);
            // dd(Session::get('url.intented'));
            if (Session::get('url.intented')) {
                return Redirect::to(Session::get('url.intended'));
            } 
                return redirect('/');
        }  
        return back()->withError('credentials are nort correct !');
        
    }

    public function registerSubmit(RegisterRequest $request)
    {
        // use laravel ui 
        // $request->validate([
        //     'fullname'=>'required|string|max:225',
        //     'email'=>'required|email|unique:users,email',
        //     'username'=>'nullable|string|max:225',
        //     'address'=>'nullable|max:2000',
        // ]);
    }
}
