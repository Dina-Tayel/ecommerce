@extends('web.layouts.master')
@section('content')
    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Cart</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Cart Area -->
    <div class="cart_area section_padding_100_70 clearfix">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12">
                    <div class="cart-table">
                        <div class="table-responsive" id="cart_list">
                            @include('web.layouts._cart-list')
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="cart-apply-coupon mb-30">
                        <h6>Have a Coupon?</h6>
                        <p>Enter your coupon code here &amp; get awesome discounts!</p>
                        <!-- Form -->
                       @include('web.partials._session_messages')
                        <div class="coupon-form">
                            <form action="{{ route('coupon.add') }}" method="POST" id="coupon-form">
                                @csrf
                                <input type="text" name="coupon" class="form-control" id="coupon-name"
                                    placeholder="Enter Your Coupon Code">
                                <button type="submit" class="btn btn-primary coupon-btn">Apply Coupon</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5">
                    <div class="cart-total-area mb-30">
                        <h5 class="mb-3">Cart Totals</h5>
                        <div class="table-responsive">
                            <table class="table mb-3">
                                <tbody>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td>$56.00</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>$10.00</td>
                                    </tr>
                                    <tr>
                                        <td>VAT (10%)</td>
                                        <td>$5.60</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>$71.60</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="checkout-1.html" class="btn btn-primary d-block">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
@endsection
@push('scripts')
    <script>
        $('.cart_list_delete').click(function() {
            // alert('kjs');
            var id = $('.product_row').data('id');
            var row_id = $(this).data('id');
            var route = "{{ route('cart.delete') }}";
            var token = "{{ csrf_token() }}";
            $.ajax({
                url: route,
                type: 'DELETE',
                data: {
                    _token: token,
                    product_id: row_id,
                },
                success: function(reponse) {
                    $('body #cart_counter').html(reponse['cart_count']);
                    $('body #header_ajax').html(reponse['header']);
                    if (reponse['status']) {
                        $('#' + id).remove();
                        swal({
                            title: "Good job!",
                            text: reponse['message'],
                            icon: "success",
                            button: "Ok",
                        });
                    }
                }

            })

        })
    </script>

    <script>
        $('.qty-text').click(function() {
            var row_id = $(this).data('id');
            var input = $(this).closest('div.quantity').find('input[type="number"]');
            // alert(spinner.val());
            if (input.val() == 1) {
                return false;
            } else {
                var newVal = $('#qty-input-' + row_id).val(input.val());
            }
            var product_qty = $('#qty-input-' + row_id).val();
            updateCart(row_id, product_qty)

        });

        function updateCart(id, product_qty) {
            var row_id = id;
            var product_qty = product_qty;
            var stock = $('#product-stock-' + row_id).data('stock');
            var route = "{{ route('cart.update') }}";
            var token = "{{ csrf_token() }}";
            $.ajax({
                url: route,
                type: 'POST',
                data: {
                    _token: token,
                    row_id: row_id,
                    stock: stock,
                    product_qty: product_qty,
                },
                success: function(reponse) {
                    $('body #cart_counter').html(reponse['cart_count']);
                    $('body #header_ajax').html(reponse['header']);
                    if (reponse['status']) {
                        $('body #cart_list').html(respose['cart_list'])
                        swal({
                            title: "Good job!",
                            text: reponse['message'],
                            icon: "success",
                            button: "Ok",
                        });
                    } else {
                        alert(reponse['message'])
                    }
                }
            })
        }
    </script>
    <script>
        $('.coupon-btn').click(function(e) {
            e.preventDefault();
            // var coupon = $('input[name=coupon]').val();
            var coupon = $('#coupon-name').val();
            $('.coupon-btn').html('loading...');
            $('#coupon-form').submit();
        })
    </script>
@endpush
