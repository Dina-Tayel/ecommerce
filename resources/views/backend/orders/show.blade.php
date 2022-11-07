@extends('backend.layouts.master')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">All Orders </h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <p class="text-muted">Order list </p>
                    <div class="live-preview">
                        <div class="">

                            <table class="table dataTable table-striped table-hover mb-4 table-bordered">
                                <thead>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Payment Method</th>
                                    <th>Payment status</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>{{ $order->payment_status }}</td>
                                        <td> <span
                                                class="badge @if ($order->condition == 'pending') bg-info
                                    @elseif ($order->condition == 'processing')  bg-primary
                                    @elseif ($order->condition == 'delivered')   bg-success
                                    @else bg-danger @endif">pending</span>
                                        </td>
                                        <td>
                                            <div style="display: flex">
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $order->id }}">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('order.destroy', $order->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $order->id }}">
                                                <div class="modal-body">
                                                    Are You Sure You Want to delete this order ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </table>


                            <table class="table dataTable table-striped table-hover  table-bordered">
                                <thead>
                                    <th>#</th>
                                    <th>IMAGE</th>
                                    <th>Quantity </th>
                                    <th>Price</th>
                                </thead>
                                <tbody>
                                    @foreach ($order->products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ $product->image_path }}" width="100px"></td>
                                            <td>{{ $product->pivot->quantity }}</td>
                                            <td>{{ number_format($product->price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->

                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-5 border m-3 py-3">
                        <p> <strong>subtotal</strong>: ${{ number_format($order->subtotal, 2) }}</p>
                        @if ($order->delivary_charge)
                            <p> <strong>shipping</strong>: ${{ number_format($order->delivary_charge, 2) }}</p>
                        @endif
                        @if ($order->coupon)
                            <p> <strong>coupon</strong>: ${{ number_format($order->coupon, 2) }}</p>
                        @endif
                        <p> <strong>total</strong>: ${{ number_format($order->total_amount, 2) }}</p>
                        <form method="post" action="{{ route('order.status')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $order->id}}">
                            <select name="condition" id="child_cat_id"
                                        class="form-select mb-3">
                                        <option disabled selected>select order status</option>
                                        <option value="pending" {{ $order->condition = 'delivered' || $order->condition = 'cancelled' ? 'disabled' : ''}} {{ $order->condition =='pending' ? 'selected' :''}}>pending</option>
                                        <option value="processing" {{ $order->condition = 'delivered' || $order->condition = 'cancelled' ? 'disabled' : ''}} {{ $order->condition =='processing'  ? 'selected' :''}}>processing</option>
                                        <option value="delivered" {{ $order->condition = 'cancelled' ? 'disabled' : ''}} {{ $order->condition =='delivered'  ? 'selected' :''}}>delivered</option>
                                        <option value="cancelled" {{ $order->condition = 'delivered' ? 'disabled' : ''}} {{ $order->condition =='cancelled'  ? 'selected' :''}}>cancelled</option>
                                    </select>
                                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                        </form>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>
@endsection
