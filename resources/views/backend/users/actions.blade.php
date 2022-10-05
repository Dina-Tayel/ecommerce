<div class="" style="display: flex">
    {{-- show0modal --}}
    <a href="" data-bs-toggle="modal" data-bs-target="#showModal{{ $id }}"
        class="btn btn-success btn-sm mx-1"><i class="ri-eye-close-line"></i></a>
    {{-- edit product --}}
    <a href="{{ route('users.edit', $id) }}" class="btn btn-primary btn-sm mx-1"><i class="ri-edit-line "></i></a>

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
                <form method="POST" action="{{ route('users.destroy', $id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="modal-body">
                        Are You Sure You Want to delete this {{ $fullname }} ?
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
                        {{ \Illuminate\Support\Str::upper($fullname) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Name:</strong>
                            <p>{{  \Illuminate\Support\Str::upper($fullname)  }} </p>
                        </div>
                        <div class="col-md-6">
                            <strong>Username:</strong>
                            <p>{!! $username !!} </p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <strong>Email:</strong>
                            <p>{{ $email ? $email : 'Not Found' }} </p>
                        </div>
                        <div class="col-md-6">
                            <strong>Phone:</strong>
                            <p>{{ $phone ? $phone : 'Not Found' }} </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>role:</strong>
                            <p>{{ $role }} </p>
                        </div>
                        <div class="col-md-6">
                            <strong>address:</strong>
                            <p>{{ $address ? $address : 'NotFound' }} </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <strong>products:</strong>
                                {{ $product_title}}
                        </div>
                        <div class="col-md-6">
                            <strong>status:</strong>
                            <span class="badge bg-success">{{ $status }}</span>
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
