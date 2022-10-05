@extends('backend.layouts.master')
@section('content')
    <div class="container-fluid">

        <div class="position-relative mx-n4 mt-n4">
            <div class="profile-wid-bg profile-setting-img">
                <img src="{{ asset('backend/assets/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
                <div class="overlay-content">
                    <div class="text-end p-3">
                        <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                            <input id="profile-foreground-img-file-input" type="file"
                                class="profile-foreground-img-file-input">
                            <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                                <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xxl-3">
                <div class="card mt-n5">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}"
                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                    alt="user-profile-image">
                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                    <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                    <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            <i class="ri-camera-fill"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <h5 class="fs-16 mb-1">{{ auth()->user()->name }} </h5>
                            <p class="text-muted mb-0">Lead Designer / Developer</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-5">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0">Complete Your Profile</h5>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="javascript:void(0);" class="badge bg-light text-primary fs-12"><i
                                        class="ri-edit-box-line align-bottom me-1"></i> Edit</a>
                            </div>
                        </div>
                        <div class="progress animated-progress custom-progress progress-label">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="label">30%</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end card-->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0"> Change Password</h5>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="javascript:void(0);" class="badge bg-light text-primary fs-12"><i
                                        class="ri-add-fill align-bottom me-1"></i> Add</a>
                            </div>
                        </div>
                        <form action="{{ route('user-password.update') }}" method="post">
                            @csrf
                            @method('put')

                            @if (session('status') == 'password-updated')
                                <div class="alert alert-success text-center">
                                    Password updated successfully.
                                </div>
                            @endif

                            <div class="row g-2">
                                <div class="col-lg-4">
                                    <div>
                                        <label for="oldpasswordInput" class="form-label">current_password *</label>
                                        <input type="password" value="{{ old('current_password') }}" name="current_password"
                                            class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                                            id="oldpasswordInput" placeholder="Enter current password">
                                    </div>
                                    @error('current_password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div>
                                        <label for="newpasswordInput" class="form-label">New Password*</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="newpasswordInput" placeholder="Enter new password">
                                    </div>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div>
                                        <label for="confirmpasswordInput" class="form-label">Confirm Password*</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="confirmpasswordInput" placeholder="Confirm password">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">Change Password</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>

                            <!--end row-->
                        </form>
                    </div>
                </div>
                <!--end card-->

            </div>
            <!--end col-->
            <div class="col-xxl-9">
                <div class="card mt-xxl-n5">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab"
                                    aria-selected="true">
                                    <i class="fas fa-home"></i> Personal Details
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                {{-- <form action="{{route('profile.update',Auth::user())}}" method="post"> --}}
                                <form action="{{ route('user-profile-information.update') }}" method="post">
                                    @csrf
                                    @method('put')
                                    @if (session('status') == 'profile-information-updated')
                                        <div class="alert alert-success text-center">
                                            profile updated successfully.
                                        </div>
                                    @endif
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="nameInput" class="form-label"> Name</label>
                                                <input type="text" name="fullname"
                                                    class="form-control @error('fullname') is-invalid @enderror"
                                                    id="nameInput" placeholder="Enter your firstname"
                                                    value="{{ old('name') ?? auth()->user()->fullname }}">
                                            </div>
                                            @error('fullname')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!--end col-->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="phonenumberInput" class="form-label">Phone Number</label>
                                                <input type="text" name="phone" class="form-control"
                                                    id="phonenumberInput" placeholder="Enter your phone number"
                                                    value="{{ old('phone') ?? auth()->user()->phone }}">
                                                @error('phone')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control"
                                                    id="emailInput" placeholder="Enter your email"
                                                    value="{{ old('email') ?? auth()->user()->email }}">
                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!--end col-->

                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                            <!--end col-->

                                        </div>
                                        <!--end row-->
                                    </div>
                                </form>
                            </div>
                            <!--end tab-pane-->



                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>
@stop
