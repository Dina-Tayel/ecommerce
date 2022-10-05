@extends('backend.layouts.master')
@section('breadcrumb')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Products </h4>
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('products.index')}}"> products</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.create')}}"> Add New Product </a></li>
            <li class="breadcrumb-item active">All product images</li>

        </ol>
    </div>

</div>
@endsection
@section('content')
    @if ($images->count() > 0)
        <div class="row mt-4">
            @foreach ($images as $image)
                <div class="col-md-3 text-center">
                    <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
                        <div class="card-body">
                            <img src="{{ asset('uploads/products/images/' . $image->img) }}" class="card-img-top">
                            {{-- <a href="{{route('products.image.delete',$image->id)}}" class="btn btn-danger mt-2"> Delete</a> --}}
                            <a href="{{ route('product-images.edit', $image->id) }}" class="btn btn-info btn-sm mt-1"><i
                                    class="fa fa-edit "></i>Edit</a>

                            <form method="POST" action="{{ route('product-images.destroy', $image->id) }}" class="mt-3"
                                id='form-delete' style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm show_confirm" form="form-delete"
                                    data-toggle="tooltip"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="container-fluid">
                <div class="d-flex justify-content-center">
                    <div class="row">
                        <div class="">
                            <h5 class="text-center"> للاسف لايوجد اي بيانات </h5>
                        </div>
                    </div>
                </div>
            </div>
    @endif
@endsection
