<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.profile.index');
    }

    public function edit()
    {
        return view('backend.profile.edit');
    }
}
