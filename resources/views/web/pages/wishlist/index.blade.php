@extends('web.layouts.master')
@section('content')
    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Wishlist</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Wishlist Table Area -->
    <div class="wishlist-table section_padding_100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table wishlist-table">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-30">
                                <thead>
                                    <tr>
                                        <th scope="col"><i class="icofont-ui-delete"></i></th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (Cart::instance('wishlist')->count() > 0)
                                        @foreach (Cart::instance('wishlist')->content() as $item)
                                            <tr id="wishlist-row-item-{{ $item->rowId }}">
                                                <th scope="row" id="wishlist-row-item-{{ $item->rowId }}">
                                                    <i class="icofont-close delete-wishlist-item"
                                                        class="delete-wishlist-item-{{ $item->rowId }}"
                                                        data-id="{{ $item->rowId }}">
                                                    </i>
                                                </th>
                                                <td>
                                                    <img src="{{ asset('uploads/products/' . $item->model->img) }}"
                                                        alt="Product">
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('category.products', $item->model->slug) }}">{{ $item->name }}</a>
                                                </td>
                                                <td>${{ number_format($item->price, 2) }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm move-to-cart"
                                                        id="move-to-cart-{{ $item->rowId }}"
                                                        data-id="{{ $item->rowId }}">
                                                        Add to Cart
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="texte-center">
                                                You don't have any items in your wishlist

                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist Table Area -->
@endsection
@push('scripts')
    <!---------------- move item from wishlist to cart---------------->
    <script>
        $('.move-to-cart').click(function(e) {
            e.preventDefault();
            var rowId = $(this).data('id');
            var token = "{{ csrf_token() }}";
            var route = "{{ route('wishlist.move.cart') }}";
            $.ajax({
                url: route,
                type: 'POST',
                data: {
                    _token: token,
                    rowId: rowId,
                },
                beforeSend: function() {
                    $('#move-to-cart' + rowId).html(
                        '<li class="fa fa-spinner fa-spin"></li>Moving To Cart');
                },
                complete: function() {
                    $('#move-to-cart' + rowId).html('Add to Cart');
                },
                success: function(response) {
                    if (response['status']) {
                        $('#wishlist-row-item-' + rowId).remove();
                        $('body #cart_counter').html(response['cart_count']);
                        $('body #header_ajax').html(response['header']);
                        swal({
                            title: "Good job!",
                            text: response['message'],
                            icon: "success",
                            button: "Ok",
                        });

                    } else {
                        swal({
                            title: "OOPS!",
                            text: 'Something went Wrong',
                            icon: "warning",
                            button: "Ok",
                        });
                    }
                },
                error: function(error) {
                    swal({
                        title: "ERROR!",
                        text: 'Some Error',
                        icon: "error",
                        button: "Ok",
                    });
                }
            })
        })
    </script>

    <!---------------------- delete item from wishlist----------------------->
    <script>
        $('.delete-wishlist-item').click(function() {
            var rowId = $(this).data('id');
            var token = "{{ csrf_token() }}";
            var route = "{{ route('wishlist.delete') }}";
            $.ajax({
                url: route,
                type: 'POST',
                data: {
                    _token: token,
                    rowId: rowId,
                },
                success: function(response) {
                    if (response['status']) {
                        $('#wishlist-row-item-' + rowId).remove();
                        $('body #header_ajax').html(response['header']);
                        swal({
                            title: "Good job!",
                            text: response['message'],
                            icon: "success",
                            button: "Ok",
                        });

                    } else {
                        swal({
                            title: "OOPS!",
                            text: 'Something webt Wrong',
                            icon: "warning",
                            button: "Ok",
                        });
                    }
                },
                error: function(error) {
                    swal({
                        title: "ERROR!",
                        text: 'Some Error',
                        icon: "error",
                        button: "Ok",
                    });
                }
            })

        })
    </script>
@endpush
