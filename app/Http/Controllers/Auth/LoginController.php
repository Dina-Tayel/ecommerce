<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function loginForm($type)
    {
        return view('auth.login', compact('type'));
    }

    public function login(Request $request, $type)
    {

        if ($type == 'admin') {
            $guardName = 'admin';
        } elseif ($type == 'seller') {
            $guardName = 'seller';
        } else {
            $guardName = 'web';
        }
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (auth($guardName)->attempt($request->only(['email', 'password']), $request->get('remember'))) {

            if ($request->type == 'admin') {

                return redirect()->intended('/admin/home');
            } elseif ($request->type == 'seller') {

                return 'seller';
            } else {
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }

        return back()->withInput($request->only('email', 'remember'))->with('error', 'credentials are not correct');
    }

    public function logout(Request $request, $type)
    {
        Auth::guard($type)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        if ($type == 'admin') {
            return  redirect()->route('admin.login', $type);
        }elseif($type == 'seller'){
            return 'lkmdx';
        }else{    //web
            return  redirect()->route('user.login','user');
        }
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
