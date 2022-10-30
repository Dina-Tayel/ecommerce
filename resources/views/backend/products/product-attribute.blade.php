@extends('backend.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1"> Add product attribute</h4>
                    <p class="text-muted">products Count is {{ App\Models\Product::count() }} </p>

                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <form method="POST" action="{{ route('product.attributes', $product) }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div id="example-1" class="content"
                                    data-mfield-options='{"section": ".group","btnAdd":"#btnAdd-1","btnRemove":".btnRemove"}'>
                                    <div class="row">
                                        <div class="col-md-12"><button type="button" id="btnAdd-1"
                                                class="btn btn-primary">Add section</button></div>
                                    </div>
                                    <div class="row group me">
                                        <div style="display: flex" class="m-3">
                                            <div class="col-md-2 ">
                                                <label>Size</label>
                                                {{-- <input class="form-control-sm" name="size[]" value="{{ old('size.*') }}"
                                                    type="text" placeholder="eg.M"> --}}
                                                @if (old('size'))
                                                    @for ($i = 0; $i < count(old('size')); $i++)
                                                        <input class="form-control-sm" name="size[]"
                                                            value="{{ old('size.' . $i) }}" type="text"
                                                            placeholder="eg.M">
                                                    @endfor
                                                @else
                                                    <input class="form-control-sm" name="size[]" value=""
                                                        type="text" placeholder="eg.M">
                                                @endif
                                                {{-- @error('size')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror --}}
                                            </div>
                                            <div class="col-md-2">
                                                <label>original price</label>
                                                {{-- <input class="form-control-sm" step="any"
                                                    value="{{ old('original_price.*') }}" name="original_price[]"
                                                    type="number" placeholder="eg.1200"> --}}
                                                @if (old('original_price'))
                                                    @for ($i = 0; $i < count(old('original_price')); $i++)
                                                        <input class="form-control-sm" name="original_price[]"
                                                            value="{{ old('original_price.' . $i) }}" type="text"
                                                            placeholder="eg.M">
                                                    @endfor
                                                @else
                                                    <input class="form-control-sm" name="original_price[]" value=""
                                                        type="text" placeholder="eg.M">
                                                @endif
                                                {{-- @error('original_price')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror --}}
                                            </div>
                                            <div class="col-md-2">
                                                <label>offer price</label>

                                                {{-- <input class="form-control-sm " step="any"
                                                    value="{{ old('offer_price.*') }}" name="offer_price[]" type="number"
                                                    placeholder="eg.1000"> --}}
                                                @if (old('offer_price'))
                                                    @for ($i = 0; $i < count(old('offer_price')); $i++)
                                                        <input class="form-control-sm" name="offer_price[]"
                                                            value="{{ old('offer_price.' . $i) }}" type="text"
                                                            placeholder="eg.M">
                                                    @endfor
                                                @else
                                                    <input class="form-control-sm" name="offer_price[]" value=""
                                                        type="text" placeholder="eg.M">
                                                @endif
                                                {{-- @error('offer_price')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror --}}
                                            </div>
                                            <div class="col-md-2">
                                                <label>stock</label>
                                                {{-- <input class="form-control-sm" step="any" value="{{ old('stock.*') }}"
                                                    name="stock[]" type="number" placeholder="eg.4"> --}}
                                                @if (old('stock'))
                                                    @for ($i = 0; $i < count(old('stock')); $i++)
                                                        <input class="form-control-sm" name="stock[]"
                                                            value="{{ old('stock.' . $i) }}" type="text"
                                                            placeholder="eg.M">
                                                    @endfor
                                                @else
                                                    <input class="form-control-sm" name="stock[]" value=""
                                                        type="text" placeholder="eg.M">
                                                @endif
                                                {{-- @error('stock')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror --}}
                                            </div>
                                        </div>

                                        <div class="col-md-2 mt-4">
                                            <button type="button" class="btn btn-danger btn-sm btnRemove">Remove</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-sm btn-primary mt-4">submit</button>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="row mb-3">
                    <table class="table dataTable  table-striped table-hover  table-bordered">
                        <thead>
                            <th>size</th>
                            <th>original price</th>
                            <th>offer price</th>
                            <th>stock</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @if ($product_attributes->count() > 0)
                                @foreach ($product_attributes as $product_attribute)
                                    <tr>
                                        <td>{{ $product_attribute->size }}</td>
                                        <td>{{ $product_attribute->original_price }}</td>
                                        <td>{{ $product_attribute->offer_price }}</td>
                                        <td>{{ $product_attribute->stock }}</td>
                                        <td>
                                            <div style="display: flex">
                                                <!-- Delete Button trigger modal -->
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $product_attribute->id }}">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                                <div class="modal fade" id="deleteModal{{ $product_attribute->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Delete</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST"
                                                                action="{{ route('product.attributes.delete', $product_attribute) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="modal-body">
                                                                    Are You Sure You Want to delete this size
                                                                    {{ $product_attribute->size }} ?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <!-- Delete Modal -->
                                @endforeach
                            @else
                                No product attributes found
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
@push('scripts')
    <script src="{{ asset('backend/assets/js/jquery.multifield.min.js') }}"></script>
    <script>
        $('#example-1').multifield();
    </script>
@endpush
