@extends('backend.layouts.master')
@section('styles')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Add New shipping </h4>

                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form method="POST" action="{{ route('shipping.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            <div class="row gy-12">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">shipping Address</label>
                                        <input type="text" name="shipping_address"
                                            class="form-control @error('shipping_address') is-invalid @enderror"
                                            id="basiInput" value="{{ old('shipping_address') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                @error('shipping_address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end row-->

                               <div class="row gy-12">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">shipping Time</label>
                                        <input type="string" name="shipping_time"  
                                            class="form-control @error('shipping_time') is-invalid @enderror"
                                             id="basiInput" value="{{ old('shipping_time') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                @error('shipping_time')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end row-->

                               <div class="row gy-12">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">shipping Cahrge</label>
                                        <input type="number" name="shipping_charge" step="any"
                                            class="form-control @error('shipping_charge') is-invalid @enderror"
                                            id="basiInput" value="{{ old('shipping_charge') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                @error('shipping_charge')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end row-->

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
