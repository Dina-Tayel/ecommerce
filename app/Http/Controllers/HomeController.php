<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

   
    public function index()
    {
        return redirect()->route('home');
        // return redirect(auth()->user()->role) ;  // route---> admin


        // if (! auth()->user()) {
        //     return redirect('/');
        // }

        // if (auth()->user()->role == 'customer') {
        //     return redirect('/');

        // } elseif (auth()->user()->role == 'admin') {
        //     return redirect(auth()->user()->role);  // route---> admin
        // }
        
    }
}
