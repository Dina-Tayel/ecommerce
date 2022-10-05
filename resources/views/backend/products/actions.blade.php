<div class="" style="display: flex">
    {{-- show0modal --}}
    <a href="" data-bs-toggle="modal" data-bs-target="#showModal{{ $id }}"
        class="btn btn-success btn-sm mx-1"><i class="ri-eye-close-line"></i></a>
    {{-- edit product --}}
    <a href="{{ route('products.edit', $id) }}" class="btn btn-primary btn-sm mx-1"><i class="ri-edit-line "></i></a>
    {{-- update product images --}}
    <a href="{{ route('product-images.show', $id) }}" class="btn btn-dark btn-sm mx-1"><i class="ri-eye-line"></i></a>

    <!-- Delete Button trigger modal -->
    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
        data-bs-target="#deleteModal{{ $id }}">
        <i class="ri-delete-bin-line"></i>
    </button>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('products.destroy', $id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="modal-body">
                        Are You Sure You Want to delete this {{ $title }} ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Show Modal -->
    <div class="modal fade" id="showModal{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">
                        {{ \Illuminate\Support\Str::upper($title) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <strong>Summary:</strong>
                    <p>{!! $summary !!} </p>
                    <strong>Description:</strong>
                    <p>{!! $desc !!} </p>

                    <div class="row">
                        <div class="col-md-6">
                            <strong>Price:</strong>
                            <p>${{ number_format($price, 2) }} </p>
                        </div>
                        <div class="col-md-6">
                            <strong>offer price:</strong>
                            <p>${{ number_format($offer_price, 2) }} </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>stock:</strong>
                            <p>{{ $stock }} </p>
                        </div>
                        <div class="col-md-6">
                            <strong>descount:</strong>
                            <p>{{ $discount }}% </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <strong>status:</strong>
                            <span class="badge bg-success">{{ $status }}</span>
                        </div>
                        <div class="col-md-6">
                            <strong>condition:</strong>
                            <span class="badge bg-warning">{{ $condition }}</span>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <strong>Size:</strong>
                            <span class="badge bg-success">{{ $size }}</span>
                        </div>
                        <div class="col-md-6">
                            <strong>vendor</strong>
                            {{ $fullname }}
                            <span class="badge bg-warning"></span>
                        </div>
                    </div>
                    
                  

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>
