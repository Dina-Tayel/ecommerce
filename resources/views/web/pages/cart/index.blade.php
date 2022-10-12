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
            <div class="row justify-content-between" id="cart_list">
                @include('web.layouts._cart-list')
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
@endsection
@push('scripts')
    {{-- delete from cart --}}
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

    {{-- update cart --}}
    <script>
        $(document).on('click', '.qty-text', function() {
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
                        $('body #cart_list').html(reponse['cart_list'])
                        swal({
                            title: "Good job!",
                            text: reponse['message'],
                            icon: "success",
                            button: "Ok",
                        });
                    } else {
                        swal({
                            title: "Good job!",
                            text: reponse['message'],
                            icon: "success",
                            button: "Ok",
                        });
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
