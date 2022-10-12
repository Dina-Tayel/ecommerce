@extends('web.layouts.master')
@section('content')
    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Checkout</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Checkout Steps Area -->
    <div class="checkout_steps_area">
        <a class="complated" href="{{ route('checkout') }}"><i class="icofont-check-circled"></i> Billing</a>
        <a class="active" href="checkout-3.html"><i class="icofont-check-circled"></i> Shipping</a>
        <a href="#"><i class="icofont-check-circled"></i> Payment</a>
        <a href="#"><i class="icofont-check-circled"></i> Review</a>
    </div>
    <!-- Checkout Steps Area -->

    <!-- Checkout Area -->
    <div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="checkout_details_area clearfix">
                        <h5 class="mb-4">Shipping Method</h5>

                        <form method="POST" action="{{ route('checkout2.store') }}">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger text-center">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="shipping_method">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Method</th>
                                                <th scope="col">Delivery Time</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Choose</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($shipping as $key => $item)
                                                <tr>
                                                    <th scope="row">{{ $item->shipping_address }}</th>
                                                    <td>{{ $item->shipping_time }}</td>
                                                    <td>${{ $item->shipping_charge }}</td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" required id="customRadio{{ $key + 1 }}"
                                                                name="shipping_charge" value="{{ $item->shipping_charge }}"
                                                                class="custom-control-input">
                                                            <label class="custom-control-label"
                                                                for="customRadio{{ $key + 1 }}"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="checkout_pagination mt-3 d-flex justify-content-end clearfix">
                                    <a href="{{ route('checkout') }}" class="btn btn-primary mt-2 ml-2">Go Back</a>
                                    <button type="submit" class="btn btn-primary mt-2 ml-2">Continue</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Area End -->
@endsection
