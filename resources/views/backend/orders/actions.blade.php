<div class="" style="display: flex">
    {{-- show0modal --}}
    {{-- <a href="" data-bs-toggle="modal" data-bs-target="#showModal{{ $id }}"
        class="btn btn-success btn-sm mx-1"><i class="ri-eye-close-line"></i></a> --}}
    <a href="{{ route('order.show', $id) }}" class="btn btn-primary btn-sm mx-1"><i class="ri-eye-close-line"></i></a>

    {{-- edit order --}}
    <a href="{{ route('order.edit', $id) }}" class="btn btn-primary btn-sm mx-1"><i class="ri-edit-line "></i></a>
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
                <form method="POST" action="{{ route('order.destroy', $id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="modal-body">
                        Are You Sure You Want to delete this order ?
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
    {{-- <div class="modal fade" id="showModal{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">
                        {{ $order_number}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                 
                    <div class="row">
                        <div class="col-md-4">
                            <strong>name:</strong>
                            <p>{{ $first_name}} {{ $last_name}} </p>
                        </div>
                        <div class="col-md-4">
                            <strong>city:</strong>
                            <p>{{ $city }} </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>address:</strong>
                            <p>{{ $address }} </p>
                        </div>
                        <div class="col-md-4">
                            <strong>phone:</strong>
                            <p>{{ $phone }} </p>
                        </div>
                        <div class="col-md-4">
                            <strong>email:</strong>
                            <p>{{ $email }} </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>coupon:</strong>
                            <p>{{ $coupon }} </p>
                        </div>
                        <div class="col-md-4">
                            <strong> Total:</strong>
                            <p>${{ number_format($total_amount, 2) }} </p>
                        </div>
                        <div class="col-md-4">
                            <strong> status:</strong>
                            <span class="badge @if ($condition=='pending')
                            bg-info
                            @elseif ($condition=='processing')  bg-primary
                            @elseif ($condition=='delivered')   bg-success
                            @else bg-danger
                            @endif">pending</span>
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>payment method:</strong>
                            <p>{{ $payment_method }} </p>
                        </div>
                        <div class="col-md-4">
                            <strong> payment status:</strong>
                            <p>{{ $payment_status }} </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div> --}}
</div>
