.@extends('backend.layouts.master')
@section('styles')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Update Category</h4>

                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form method="POST" action="{{ route('categories.update', $category->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row gy-12">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Title</label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="enter title" id="basiInput"
                                            value="{{ old('title') ?? $category->title }}">
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
                                        <label for="basiInput" class="form-label">Description</label>
                                        <textarea id="" name="desc" class="form-control mytextarea @error('desc') is-invalid @enderror"
                                            placeholder="enter some text..."> {!! old('desc') ?? $category->desc !!}
                                    </textarea>
                                    </div>
                                    @error('desc')
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
                                    {{-- @if ($category->img)
                                    <img src="{{$category->image_path }}" style="width:100px" class="img-thumbnail image-preview1"
                                       >
                                    @endif --}}
                                    <img src="{{ $category->image_path }}" style="width:100px" class="img-thumbnail"
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

                            <div class="row">
                                <div class="col-md-12">
                                    <input name="is_parent" id="is_parent" type="checkbox" value="1"
                                        {{ $category->is_parent == 1 ? 'checked' : '' }}>
                                    <label for="basiInput" class="form-label text-bold">Is Parent !? </label>
                                </div>
                                @error('is_parent')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="row gy-4 {{ $category->is_parent == 1 ? 'd-none' : '' }}" id="parent_category_div">
                                <div class="col-xxl-12 col-md-12">
                                    <label for="basiInput" class="form-label"> Parent Category </label>
                                    <select name="parent_id"
                                        class="form-select mb-3 @error('parent_id') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option value="" disabled selected> -----Select parent----- </option>
                                        @foreach ($parent_cats as $parent_cat)
                                            <option value="{{ $parent_cat->id }}"
                                                {{ $category->parent_id == $parent_cat->id ? 'selected' : '' }}>
                                                {{ $parent_cat->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end col-->

                            </div>

                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <label for="basiInput" class="form-label"> Status </label>
                                    <select name="status" class="form-select mb-3 @error('status') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option selected="" disabled selected> -----Select Status----- </option>
                                        <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>
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

                            <!--end row-->
                            <button type="submit" class="btn btn-success"> Update</button>
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
        $('#is_parent').change(function(e) {
            e.preventDefault();
            var is_checked = $('#is_parent').prop('checked');
            if (is_checked) {
                $('#parent_category_div').addClass('d-none');
                $('#parent_category_div').val();

            } else {
                $('#parent_category_div').removeClass('d-none');
            }
        })
    </script>
@endpush
