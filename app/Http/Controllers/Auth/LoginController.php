<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Traits\AuthTrait;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    // use AuthenticatesUsers;
    // protected $redirectTo = RouteServiceProvider::HOME;

    use AuthTrait;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function loginForm($type)
    {
        if ($type == 'admin') {
            
            return view('auth.login', compact('type'));

        }elseif($type=='seller')
        {
            return 'seller' ;

        }else{
            return view('web.auth.login');
        }
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (auth($this->checkGuard($request))->attempt($request->only(['email', 'password']), $request->get('remember'))) {

            return $this->LoginRedirect($request);
        }

        return back()->withInput($request->only('email', 'remember'))->with('error', 'credentials are not correct');
    }

    public function logout(Request $request, $type)
    {
        Auth::guard($type)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $this->LogoutRedirect($type);
    }

    // public function credentials(Request $request)
    // {
    //     return ['email'=>$request->email , 'password'=>$request->password ];

    //     // return ['email'=>$request->email , 'password'=>$request->password , 'role'=>'admin' , 'status'=>'active'];
    // }

    // public function authenticated($request , $user){
    //     if($user->role=='admin'){
    //         return redirect()->route('admin') ;
    //     }elseif($user->role=='customer'){
    //         return redirect('/') ;
    //     }else{
    //         return redirect('/') ;

    //     }
    // }

}
