@extends('web.layouts.master')
@section('content')
    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Checkout</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Checkout Step Area -->
    <div class="checkout_steps_area">
        <a class="complated" href="#"><i class="icofont-check-circled"></i> Billing</a>
        <a class="complated" href="#"><i class="icofont-check-circled"></i> Shipping</a>
        <a class="complated" href="#"><i class="icofont-check-circled"></i> Payment</a>
        <a class="active" href="#"><i class="icofont-check-circled"></i> Review</a>
    </div>
    <!-- Checkout Step Area -->

    <!-- Checkout Area -->
    <div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="checkout_details_area clearfix">
                        <h5 class="mb-30">Review Your Order</h5>

                        <div class="cart-table">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-30">
                                    <thead>
                                        <tr>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Unit Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::instance('shopping')->content() as $item)
                                            <tr>
                                                <th scope="row">
                                                    <a href="#" class="btn btn-primary"><i
                                                            class="icofont-ui-edit"></i></a>
                                                </th>
                                                <td>
                                                    <img src="{{ asset('uploads/products/' . $item->model->img) }}"
                                                        alt="Product">
                                                </td>
                                                <td>
                                                    <a href="{{ $item->model->slug }}">{{ $item->name }}</a>
                                                </td>
                                                <td>${{ number_format($item->price, 2) }}</td>
                                                <td>
                                                    {{ $item->qty }}
                                                    {{-- <div class="quantity">
                                                        <input type="number" class="qty-text" id="qty2" step="1" min="1" max="99" name="quantity" value="{{ $item->qty}}">
                                                    </div> --}}
                                                </td>
                                                <td>${{ $item->subtotal }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-7 ml-auto">
                    <div class="cart-total-area">
                        <h5 class="mb-3">Cart Totals</h5>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td>${{ Cart::instance('shopping')->subtotal() }}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>${{ session()->get('sharge')['delivery_charge'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>coupon</td>

                                        <td> {{ session()->has('coupon') ? '$' . session()->get('coupon')['value'] : '--' }}
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Total</td>
                                        @if (session()->has('coupon') && empty(session()->has('checkout1')))
                                            <td>${{ number_format(str_replace(',', '', Cart::subtotal()) - session()->get('coupon')['value'], 2) }}
                                            </td>
                                        @elseif (session()->has('checkout1') && empty(session()->has('coupon')))
                                            <td>${{ number_format(str_replace(',', '', Cart::subtotal()) + session()->get('sharge')['delivery_charge'], 2) }}
                                            </td>
                                        @elseif (session()->has('coupon') && session()->has('checkout1'))
                                            <td>${{ number_format(str_replace(',', '', Cart::subtotal()) + session()->get('sharge')['delivery_charge'] - session()->get('coupon')['value'], 2) }}
                                            </td>
                                        @else
                                            <td>${{ number_format(str_replace(',', '', Cart::subtotal()), 2) }}</td>
                                        @endif

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="checkout_pagination d-flex justify-content-end mt-3">
                            <a href="{{ route('checkout.confirm') }}" class="btn btn-primary mt-2 ml-2">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Area End -->
@endsection
