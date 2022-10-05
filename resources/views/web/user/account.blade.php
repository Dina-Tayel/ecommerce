@extends('web.layouts.master')
@section('content')
    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>My Account</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">My Account</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- My Account Area -->
    <section class="my-account-area section_padding_100_50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="my-account-navigation mb-50">
                        @include('web.user._aside')
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="my-account-content mb-50">
                        <h5 class="mb-3">Account Details</h5>
                        @if (Session()->has('success'))
                        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                            {{Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                        @endif
                        <form action="{{ route('update.account', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="firstName">Full Name *</label>
                                        <input type="text" class="form-control" name="fullname" id="fullName"
                                            placeholder="eg. Dina Tayel"
                                            value="{{ old('fullname') ? old('fullname') : auth()->user()->fullname }}">
                                        @error('fullname')
                                            <p class="text-danger" id="scountry_error">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="lastName">UserName *</label>
                                        <input type="text" class="form-control" name="username" id="UserName"
                                            placeholder=" eg . Dina"
                                            value="{{ old('username') ? old('username') : auth()->user()->username }}">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="emailAddress">Email Address *</label>
                                        <input type="email" class="form-control" id="emailAddress"
                                            placeholder="care.designingworld@gmail.com" value="{{ auth()->user()->email }}"
                                            disabled>
                                        @error('email')
                                            <p class="text-danger" id="scountry_error">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="phone"> Phone *</label>
                                        <input type="phone" class="form-control" id="phone" placeholder="01209098987"
                                            value="{{ old('phone') ? old('phone') : auth()->user()->phone }}">
                                        @error('phone')
                                            <p class="text-danger" id="scountry_error">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        {{-- <label for="phone"> profile Picture *</label>
                                            <input type="file" class="form-control" id="img"  > --}}
                                        <label for="basiInput" class="form-label">profile Picture *</label>
                                        <input type="file" name="img" class="form-control" id="inputGroupFile01"
                                            onchange="loadFile(event)">
                                        </div>
                                <img src="" style="width:100px" class="img-thumbnail image-preview1" id="image">

                                        @error('img')
                                            <p class="text-danger" id="scountry_error">{{ $message }} </p>
                                        @enderror
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="currentPass">Current Password (Leave blank to leave unchanged)</label>
                                        <input type="password" class="form-control" id="currentPass"
                                            name="current_password">
                                        @error('current_password')
                                            <p class="text-danger" id="scountry_error">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="newPass">New Password (Leave blank to leave unchanged)</label>
                                        <input type="password" class="form-control" id="newPass" name="newPass">
                                        @error('newPass')
                                            <p class="text-danger" id="scountry_error">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="confirmPass">Confirm New Password</label>
                                        <input type="password" class="form-control" id="confirmPass"
                                            name="newPass_confirmation">
                                        @error('newPass_confirmation')
                                            <p class="text-danger" id="scountry_error">{{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- My Account Area -->
@endsection
@push('scripts')
    <script>
        // image-preview
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var image = document.getElementById('image');
                image.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

    </script>
@endpush