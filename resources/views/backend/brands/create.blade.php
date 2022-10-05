@extends('backend.layouts.master')
@section('styles')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Add New Brand </h4>

                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form method="POST" action="{{ route('brands.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            <div class="row gy-12">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Title</label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="enter title" id="basiInput" value="{{ old('title') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                @error('title')
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
                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <label for="basiInput" class="form-label"> Status </label>
                                    <select name="status" class="form-select mb-3 @error('status') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option selected="" disabled selected> -----Select Status----- </option>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                    @error('status')
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
