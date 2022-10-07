@extends('backend.layouts.master')
@section('styles')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Input Example</h4>

                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form method="POST" action="{{ route('coupon.store')}}" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                       
                        <div class="row gy-12">
                            <div class="col-xxl-12 col-md-12">
                                <div>
                                    <label for="basiInput" class="form-label">Code</label>
                                    <input type="text" name="code"
                                        class="form-control @error('code') is-invalid @enderror" placeholder="enter code"
                                        id="basiInput" value="{{ old('code') }}">
                                </div>
                            </div>
                            <!--end col-->
                            @error('code')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <!--end row-->
                       
                        <div class="row gy-12">
                            <div class="col-xxl-12 col-md-12">
                                <div>
                                    <label for="basiInput" class="form-label">Value</label>
                                    <input type="text" name="value"
                                        class="form-control @error('value') is-invalid @enderror" placeholder="enter value"
                                        id="basiInput" value="{{ old('value') }}">
                                </div>
                            </div>
                            <!--end col-->
                            @error('value')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <!--end row-->
                        <div class="row gy-4">
                            <div class="col-xxl-12 col-md-12">
                                    <label for="basiInput" class="form-label"> Status </label>
                                    <select name="status" class="form-select mb-3 @error('status') is-invalid @enderror" aria-label="Default select example">
                                        <option selected="" disabled selected> -----Select Status----- </option>
                                        <option value="active" {{old('status') =='active' ? 'selected' : ''}}>Active</option>
                                        <option value="inactive" {{ old('status') =='inactive' ? 'selected' :''}}>Inactive</option>
                                    </select>
                                    @error('status') 
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>
                            <!--end col-->
                          
                        </div>
                        <!--end row-->
                        <div class="row gy-4">
                            <div class="col-xxl-12 col-md-12">
                                    <label for="basiInput" class="form-label"> Type </label>
                                    <select name="type" class="form-select mb-3 @error('type') is-invalid @enderror" aria-label="Default select example">
                                        <option selected="" disabled selected> -----Select Condition----- </option>
                                        <option value="fixed" {{old('type') =='fixed' ? 'selected' : ''}}>fixed</option>
                                        <option value="percent" {{ old('type') =='percent' ? 'selected' :''}}>percent</option>
                                    </select>
                                    @error('percent')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>
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

