@extends('backend.layouts.master')
@section('styles')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">update Product</h4>
                    <a href="{{ route('product-images.show' , $product->id)}}" class="btn btn-primary brn-sm">product Images</a>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form method="POST" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row gy-12">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Title</label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="enter title" id="basiInput" value="{{ old('title') ?? $product->title }}">
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
                                        <label for="basiInput" class="form-label">Summary</label>
                                        <textarea id="" name="summary" class="form-control mytextarea  @error('summary') is-invalid @enderror"
                                            placeholder="enter some text..."> {!! old('summary') ?? $product->summary !!}
                                    </textarea>
                                    </div>
                                    @error('summary')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->

                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Description</label>
                                        <textarea id="" name="desc" class="form-control mytextarea @error('desc') is-invalid @enderror"
                                            placeholder="enter some text..."> {!! old('desc') ?? $product->desc !!}
                                    </textarea>
                                    </div>
                                    @error('desc')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->


                            <div class="row gy-12">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Price</label>
                                        <input type="text" name="price" step="any"
                                            class="form-control @error('price') is-invalid @enderror"
                                            placeholder="enter price" id="basiInput" value="{{ old('price') ?? $product->price}}">
                                    </div>
                                </div>
                                <!--end col-->
                                @error('price')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end row-->

                            <div class="row gy-12">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">  Stock </label>
                                        <input type="text" name="stock"
                                            class="form-control @error('stock') is-invalid @enderror"
                                            placeholder="enter offer price" id="basiInput"
                                            value="{{ old('stock') ?? $product->stock }}">
                                    </div>
                                </div>
                                <!--end col-->
                                @error('stock')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end row-->

                            <div class="row gy-12">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label"> discount</label>
                                        <input type="text" name="discount" min="0" max="100"
                                            class="form-control @error('discount') is-invalid @enderror"
                                            placeholder="enter discount" id="basiInput" value="{{ old('discount') ?? $product->discount}}">
                                    </div>
                                </div>
                                <!--end col-->
                                @error('discount')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end row-->

                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <label for="basiInput" class="form-label"> Size </label>
                                    <select name="size" class="form-select mb-3 @error('size') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option selected="" disabled selected> -----Select size----- </option>
                                        <option value="S" {{ $product->size  == 'S' ? 'selected' : '' }}>Small
                                        </option>
                                        <option value="M" {{ $product->size  == 'M' ? 'selected' : '' }}>
                                            Meduim
                                        </option>
                                        <option value="L" {{ $product->size  == 'L' ? 'selected' : '' }}>Large
                                        </option>
                                        <option value="XL" {{ $product->size  == 'XL' ? 'selected' : '' }}>Extra Large
                                        </option>
                                    </select>
                                    @error('size')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end col-->

                            </div>
                            <!--end row-->

                           

                            <div class="row gy-4 d-none" id="parent_category_div">
                                <div class="col-xxl-12 col-md-12">
                                    <label for="basiInput" class="form-label"> Parent Category </label>
                                    <select name="parent_id"
                                        class="form-select mb-3 @error('parent_id') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option value="" disabled selected> -----Select parent----- </option>
                                        {{-- @foreach ($parent_cats as $parent_cat)
                                            <option value="{{ $parent_cat->id}}" > {{ $parent_cat->title}}</option>
                                        @endforeach --}}
                                    </select>
                                    @error('parent_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end col-->
                            </div>

                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <label for="basiInput" class="form-label"> Brands </label>
                                    <select name="brand_id" class="form-select mb-3 @error('brand') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option selected="" disabled selected> -----Select brand----- </option>
                                        @foreach ($brands as $brand )
                                            
                                        <option value="{{$brand->id}}" {{ $product->brand_id  == $brand->id ? 'selected' : '' }}> {{ $brand->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->

                            <div class="row gy-4 mb-2">
                                <div class="col-xxl-12 col-md-12">
                                    <label for="basiInput" class="form-label"> Category </label>
                                    <select id="cat_id" name="category_id"
                                        class="form-select mb-3 @error('category_id') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option selected="" disabled selected> -----Select parent category-----
                                        </option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $product->category_id  == $category->id ? 'selected' : '' }}>
                                                {{ $category->title }}</option>
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end col-->

                            </div>
                            <!--end row-->


                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12 d-none" id="child_cat_div">
                                    <label for="basiInput" class="form-label"> child category </label>
                                    <select name="child_cat_id" id="child_cat_id"
                                        class="form-select mb-3 @error('child_cat_id') is-invalid @enderror"
                                        aria-label="Default select example">
                                        {{-- @if ($product->child_cat_id !==NULL)
                                        <option>{{$product->child_cat_id}}</option>
                                        @endif --}}
                                      
                                    </select>
                                    @error('child_cat_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end col-->

                            </div>
                            <!--end row-->


                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <label for="basiInput" class="form-label"> Vendor </label>
                                    <select name="seller_id"
                                        class="form-select mb-3 @error('vendor') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option selected="" disabled selected> -----Select vendor----- </option>
                                        @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}"
                                                {{ $product->seller_id  == $vendor->id ? 'selected' : '' }}>
                                                {{ $vendor->fullname }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('vendor')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end col-->

                            </div>
                            <!--end row-->
                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">additional information</label>
                                        <textarea id="" name="additional_info" class="form-control mytextarea @error('additional_info') is-invalid @enderror"
                                            placeholder="enter some text..."> {{ old('additional_info') ?? $product->additional_info}}
                                    </textarea>
                                    </div>
                                    @error('additional_info')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">return cancellation</label>
                                        <textarea id="" name="return_cancellation" class="form-control mytextarea @error('return_cancellation') is-invalid @enderror"
                                            placeholder="enter some text..."> {{ old('return_cancellation') ?? $product->return_cancelled }}
                                    </textarea>
                                    </div>
                                    @error('return_cancellation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <label for="basiInput" class="form-label"> Status </label>
                                    <select name="status" class="form-select mb-3 @error('status') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option selected="" disabled selected> -----Select Status----- </option>
                                        <option value="active" {{ $product->status  == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ $product->status  == 'inactive' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
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
                                    <label for="basiInput" class="form-label"> condition </label>
                                    <select name="condition"
                                        class="form-select mb-3 @error('condition') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option selected="" disabled selected> -----Select condition----- </option>
                                        <option value="new" {{ $product->condition == 'new' ? 'selected' : '' }}>New
                                        </option>
                                        <option value="popular" {{ $product->condition  == 'popular' ? 'selected' : '' }}>
                                            Popular
                                        </option>
                                        <option value="winter" {{ $product->condition  == 'winter' ? 'selected' : '' }}>Winter
                                        </option>
                                    </select>
                                    @error('condition')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end col-->

                            </div>
                            <!--end row-->

                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label"> Photo</label>
                                        <input type="file" name="img" class="form-control" id="inputGroupFile01"
                                            onchange="loadFile(event)">
                                    </div>
                                    <img src="{{ $product->image_path}}" style="width:100px" class="img-thumbnail image-preview1"
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
                                    @php
                                    $images=explode(',',$product->size_guide);
                                @endphp
                                    <div>
                                        <label for="images" class="form-label">size guide Photo</label>
                                        <input type="file" name="size_guide[]" class="form-control" id="images"
                                             multiple>
                                    </div>

                                     @foreach ($images as $key => $value )
                                     <img src="{{asset('uploads/products/size_guide/'. $value)}}" style="width:100px" class="img-thumbnail image-preview1"
                                         id="img">
                                     @endforeach

                                    <!--end col-->
                                    @error('size_guide')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="user-image mb-3 text-center">
                                    <div class="imgPreview"> </div>
                                </div>   
                                <!--end row-->
                                <!--end col-->
                            </div>
                            <button type="submit" class="btn btn-primary"> Update</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection

@push('scripts')

    <script>
         var child_cat_id = '{{ $product->child_cat_id}} ';
        $('#cat_id').change(function() {
            var cat_id = $(this).val();
            var url = "{{ route('products.child', ':cat_id') }}";
            url = url.replace(':cat_id', cat_id);
            if (cat_id != null) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        cat_id: cat_id,
                    },
                    success: function(response) {
                        if (response.status) {
                            // console.log(response);
                            $('#child_cat_div').removeClass('d-none');
                            var html_option =
                                "<option value='' disabled selected> -----Select child ----- </option>";
                            $.each(response.data, function(id, title) {
                                html_option += "<option value='"+id+"' "+(child_cat_id == id ? 'selected' : '')+">"+title+
                                    "</option>"
                            });
                            
                        } else {

                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);

                    }
                });
            }
        })

        if(child_cat_id !=null)
        {
            $('#cat_id').change();
        }
    </script>

@endpush
