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

    <!-- Checkout Step Area -->
    <div class="checkout_steps_area">
        {{-- <a class="complated" href="checkout-1.html"><i class="icofont-check-circled"></i> Login</a> --}}
        <a class="active" href="#"><i class="icofont-check-circled"></i> Billing</a>
        <a href="#"><i class="icofont-check-circled"></i> Shipping</a>
        <a href="#"><i class="icofont-check-circled"></i> Payment</a>
        <a href="#"><i class="icofont-check-circled"></i> Review</a>
    </div>

    <!-- Checkout Area -->
    <div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="checkout_details_area clearfix">
                        <h5 class="mb-4">Billing Details</h5>
                        <form method="post" action="{{ route('checkout1.store') }}" id="checkout1-form">
                            @csrf
                            <div class="row">
                                {{-- @php
                                    $name = explode(' ', $user->fullname);
                                @endphp --}}
                                {{-- <div class="col-md-6 mb-3">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                        placeholder="First Name" value="{{ old('first_name') ?? $name[0] }} " required>
                                    @error('first_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div> --}}
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                        placeholder="First Name" value="{{ old('first_name') ?? $user->fullname }} "
                                        required>
                                    @error('first_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                        placeholder="Last Name" value="{{ old('last_name') ?? $user->fullname }}" required>
                                    @error('last_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email_address">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email_address"
                                        placeholder="Email Address" value="{{ old('email') ?? $user->email }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="number" class="form-control" name="phone" id="phone_number"
                                        min="0" value="{{ old('phone') ?? $user->phone }}">
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" name="country" id="country"
                                        placeholder="country" value="{{ old('country') ?? $user->country }}">
                                    @error('country')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="street_address">Street address</label>
                                    <input type="text" class="form-control" name="address" id="street_address"
                                        placeholder="Street Address" value="{{ old('address') ?? $user->address }}">
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="city">Town/City</label>
                                    <input type="text" class="form-control" name="city" id="city"
                                        placeholder="Town/City" value="{{ old('city') ?? $user->city }}">
                                    @error('city')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" name="state" id="state"
                                        placeholder="State" value="{{ old('state') ?? $user->state }}">
                                    @error('state')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="postcode">Postcode/Zip</label>
                                    <input type="text" class="form-control" name="postcode" id="postcode"
                                        placeholder="Postcode / Zip" value="{{ old('postcode') ?? $user->postcode }}">
                                    @error('postcode')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="order-notes">Order Notes</label>
                                    <textarea class="form-control" name="note" id="order-notes" cols="30" rows="10"
                                        placeholder="Notes about your order, e.g. special notes for delivery.">{{ old('note') ?? $user->note }}</textarea>
                                    @error('note')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- Different Shipping Address -->
                            <div class="different-address mt-50">
                                <div class="ship-different-title mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Ship to the same
                                            address?</label>
                                    </div>
                                </div>
                                <div class="row shipping_input_field">
                                    <div class="col-md-6 mb-3">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="sfirst-name" name="sfirst_name"
                                            placeholder="sFirst Name" value="{{ old('sfirst_name') ?? $user->fullname }} "
                                            required>
                                        @error('sfirst_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" name="slast_name" id="slast-name"
                                            placeholder="sLast Name" value="{{ old('slast_name') ?? $user->fullname }}"
                                            required>
                                        @error('slast_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="number" class="form-control" name="sphone" id="sphone-number"
                                            min="0" value="{{ old('sphone') ?? $user->sphone }}">
                                        @error('sphone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" name="scountry" id="scountry"
                                            value="{{ old('scountry') ?? $user->scountry }}">
                                        @error('scountry')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="street_address">Street address</label>
                                        <input type="text" class="form-control" name="saddress" id="ship-address"
                                            placeholder="Street Address"
                                            value="{{ old('saddress') ?? $user->saddress }}">
                                        @error('saddress')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="city">Town/City</label>
                                        <input type="text" class="form-control" name="scity" id="ship-city"
                                            placeholder="Town/City" value="{{ old('scity') ?? $user->scity }}">
                                        @error('scity')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" name="sstate" id="ship-state"
                                            placeholder="State" value="{{ old('sstate') ?? $user->sstate }}">
                                        @error('sstate')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="postcode">Postcode/Zip</label>
                                        <input type="text" class="form-control" name="spostcode" id="ship-postcode"
                                            placeholder="Postcode / Zip"
                                            value="{{ old('spostcode') ?? $user->spostcode }}">
                                        @error('spostcode')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="checkout_pagination d-flex justify-content-end mt-50">
                                    <a href="checkout-1.html" class="btn btn-primary mt-2 ml-2">Go Back</a>
                                    <button type="submit" id="checkout1-btn"
                                        class="btn btn-primary mt-2 ml-2">Continue</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Checkout Area -->
@endsection
@push('scripts')
    <script>
        $('#customCheck1').change(function() {
            var checked = $(this).prop('checked');
            if (checked) {
                $('#sfirst-name').val($('#first_name').val());
                $('#slast-name').val($('#last_name').val());
                $('#sphone-number').val($('#phone_number').val());
                $('#ship-address').val($('#street_address').val());
                $('#scountry').val($('#country').val());
                $('#ship-city').val($('#city').val());
                $('#ship-state').val($('#state').val());
                $('#ship-postcode').val($('#postcode').val());
            } else {
                $('#sfirst-name').val('');
                $('#slast-name').val('');
                $('#sphone-number').val('');
                $('#ship-address').val('');
                $('#scountry').val('');
                $('#ship-city').val('');
                $('#ship-state').val('');
                $('#ship-postcode').val('');
            }

        })
    </script>
@endpush
