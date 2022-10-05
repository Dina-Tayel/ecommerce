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
    <div class="input-group input-group-sm" style="width: 250px;">
        {{-- <p>تعديل الصورة </p> --}}
    </div>

    <!-- /.card-header -->
    <!-- form start -->

    <form method="post" action="{{ route('product-images.update', $image->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <div class="row">
                    <div class="">
                        <div class="form-group">
                            <label for="exampleInputFile"> Upload New Image
                            </label>
                            <div class="input-group">
                                <div class="custom-file">
                                    {{-- <input onchange="readURL(this);" type="file" name="img" class="custom-file-input imginput"> --}}
                                    <input type="file" name="img" class="form-control" id="inputGroupFile01"
                                        onchange="loadFile(event)">
                                </div>
                            </div>
                            @error('img')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-group mt-2">
                                <img src={{ asset('uploads/products/' . $image->img) }} style="width:100px"
                                    id="image_selected2" class="img-thumbnail image-preview">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success ml-6" style="margin-top:10px">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
