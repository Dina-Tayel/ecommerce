@extends('web.layouts.master')
@section('content')
        <!-- Breadcumb Area -->
        <div class="breadcumb_area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <h5>Login &amp; Register</h5>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Login &amp; Register</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcumb Area -->
    
        <!-- Login Area -->
        <div class="bigshop_reg_log_area section_padding_100_50">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="login_form mb-50">
                            <h5 class="mb-3">Login</h5>
    
                           
                            {{-- <form action="{{ route('user.submit')}}" method="post"> --}}
                                <form method="POST" action="{{ route('admin.login','user') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" value="{{ old('email')}}" id="username" placeholder="Email or Username">
                                </div>
                                @error('email')
                                {{-- <span class="invalid-feedback" role="alert">
                                    <strong></strong> --}}
                                    <p class="text-danger">{{ $message }}</p>
                                @if (session('error'))
                                <p class="text-danger">{{ session('error')}}</p>
                            @endif
                            @enderror
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                                @error('password')
                                                    {{-- <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span> --}}
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                <div class="form-check">
                                    <div class="custom-control custom-checkbox mb-3 pl-1">
                                        <input type="checkbox" class="custom-control-input" id="customChe">
                                        <label class="custom-control-label" for="customChe">Remember me for this computer</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Login</button>
                            </form>
                            <!-- Forget Password -->
                            <div class="forget_pass mt-15">
                                <a href="#">Forget Password?</a>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-12 col-md-6">
                        <div class="login_form mb-50">
                            <h5 class="mb-3">Register</h5>
    
                            <form action="{{ route('register') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" id="username" placeholder="Full Name">
                                    @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="UserName">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="username" placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="Repeat Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Area End -->
@endsection