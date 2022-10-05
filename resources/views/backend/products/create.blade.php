@extends('backend.layouts.master')
@section('styles')
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
                        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
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
                                        <label for="basiInput" class="form-label">Summary</label>
                                        <textarea id="" name="summary" class="form-control mytextarea  @error('summary') is-invalid @enderror"
                                            placeholder="enter some text..."> {{ old('summary') }}
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
                                            placeholder="enter some text..."> {{ old('desc') }}
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
                                            placeholder="enter price" id="basiInput" value="{{ old('price') }}">
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
                                            value="{{ old('stock') }}">
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
                                            placeholder="enter discount" id="basiInput" value="{{ old('discount') }}">
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
                                        <option value="S" {{ old('size') == 'S' ? 'selected' : '' }}>Small
                                        </option>
                                        <option value="M" {{ old('size') == 'M' ? 'selected' : '' }}>
                                            Meduim
                                        </option>
                                        <option value="L" {{ old('size') == 'L' ? 'selected' : '' }}>Large
                                        </option>
                                        <option value="XL" {{ old('size') == 'XL' ? 'selected' : '' }}>Extra Large
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
                                            
                                        <option value="{{$brand->id}}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}> {{ $brand->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
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
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                        class="form-select mb-3 @error('seller_id') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option selected="" disabled selected> -----Select vendor----- </option>
                                        @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}"
                                                {{ old('vendor_id') == $vendor->id ? 'selected' : '' }}>
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
                                    <label for="basiInput" class="form-label"> Status </label>
                                    <select name="status" class="form-select mb-3 @error('status') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option selected="" disabled selected> -----Select Status----- </option>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
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
                                        <option value="new" {{ old('condition') == 'new' ? 'selected' : '' }}>New
                                        </option>
                                        <option value="popular" {{ old('condition') == 'popular' ? 'selected' : '' }}>
                                            Popular
                                        </option>
                                        <option value="winter" {{ old('condition') == 'winter' ? 'selected' : '' }}>Winter
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

@push('scripts')
    <script>
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
                                html_option += "<option value='"+id+"'>"+title+
                                    "</option>"
                            });

                            $('#child_cat_id').html(html_option);
                        } else {

                            $('#child_cat_div').addClass('d-none');
                        }

                    }
                });
            }
        })
    </script>
@endpush
