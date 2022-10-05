@extends('backend.layouts.master')
@section('styles')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Create user</h4>

                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            <div class="row gy-12">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">fullname</label>
                                        <input type="text" name="fullname"
                                            class="form-control @error('fullname') is-invalid @enderror"
                                            placeholder="enter fullname" id="basiInput" value="{{ old('fullname') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                @error('fullname')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end row-->

                            <div class="row gy-12">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">username</label>
                                        <input type="text" name="username"
                                            class="form-control @error('username') is-invalid @enderror"
                                            placeholder="enter username" id="basiInput" value="{{ old('username') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                @error('username')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end row-->


                            <div class="row gy-12">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="enter email" id="basiInput" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end row-->


                            <div class="row gy-12">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="enter password" id="basiInput" value="{{ old('password') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end row-->


                            <div class="row gy-12">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">phone</label>
                                        <input type="text" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="enter phone" id="basiInput" value="{{ old('phone') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end row-->
                          
                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <label for="basiInput" class="form-label"> Role </label>
                                    <select name="role" class="form-select mb-3 @error('role') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option selected="" disabled selected> -----Select role----- </option>
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="vendor" {{ old('role') == 'vendor' ? 'selected' : '' }}>
                                            vendor
                                        </option>
                                        <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>
                                            customer
                                        </option>
                                    </select>
                                    @error('role')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end col-->

                            </div>
                            <!--end row-->
                            <div class="row gy-12">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Address</label>
                                        <input type="text" name="address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            placeholder="enter address" id="basiInput" value="{{ old('address') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end row-->


                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label"> Photo</label>
                                        <input type="file" name="img" class="form-control" id="inputGroupFile01"
                                            onchange="loadFile(event)">
                                    </div>
                                    <img src="" style="width:100px" class="img-thumbnail image-preview1"
                                        id="image">

                                    <!--end col-->
                                    @error('img')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end row-->
                                <!--end col-->
                            </div>
                            <!--end row-->



                            <button type="submit" class="btn btn-primary"> Create</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection

