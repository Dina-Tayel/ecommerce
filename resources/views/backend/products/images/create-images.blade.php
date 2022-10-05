@extends('backend.layouts.master')
@section('breadcrumb')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Products </h4>
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('products.index')}}"> products</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.create')}}"> Add New Product </a></li>
            <li class="breadcrumb-item active">Update product image</li>

        </ol>
    </div>

</div>
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Create Product</h4>
                    <a href="{{ route('product-images.create')}}" class="btn btn-primary brn-sm">Add Images</a>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form method="POST" action="{{ route('product-images.store') }}" enctype="multipart/form-data">
                            @csrf
                                
                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label"> Photo</label>
                                        <input type="file" name="img[]" class="form-control" id="inputGroupFile01"
                                            onchange="loadFile(event)" multiple="multiple">
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
                                    <label for="basiInput" class="form-label"> products </label>
                                    <select name="product_id"
                                        class="form-select mb-3 @error('product_id') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option selected="" disabled selected> -----Select product----- </option>
                               
                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                            {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                            {{ $product->title }}</option>
                                    @endforeach
                                    </select>
                                    @error('product_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end col-->

                            </div>
                            <!--end row-->

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