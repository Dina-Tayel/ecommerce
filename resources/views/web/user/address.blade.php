@extends('web.layouts.master')
@section('content')
    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>My Account</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">My Account</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- My Account Area -->
    <section class="my-account-area section_padding_100_50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="my-account-navigation mb-50">
                        @include('web.user._aside')
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="my-account-content mb-50">
                        <p>The following addresses will be used on the checkout page by default.</p>

                        <div class="row">
                            <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                                <h6 class="mb-3">Billing Address</h6>
                                <address>
                                    MD NAZRUL ISLAM <br>
                                    Madhabdi, Narsingdi <br>
                                    Madhabdi <br>
                                    Narsingdi <br>
                                    1600
                                </address>
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#editBiilingAddressModal" aria-hidden="true" data-backdrop="false">Edit
                                    Address</a>
                            </div>
                            <div class="col-12 col-lg-6">
                                <h6 class="mb-3">Shipping Address</h6>
                                <address>
                                    You have not set up this type of address yet.
                                </address>
                                <a href="#" class="btn btn-primary btn-sm" class="btn btn-primary btn-sm"
                                    data-toggle="modal" data-target="#editShippingAddressModal" aria-hidden="true"
                                    data-backdrop="false">Edit Shipping Address</a>
                            </div>
                        </div>
                        <!--edit billing address Modal -->
                        <div class="modal fade" id="editBiilingAddressModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Address</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        @include('web.partials.ajax-messages')


                                        <form method="POST" id="change-address-form">
                                            @csrf

                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control" id="address" placeholder="my address" name="address">{{ auth()->user()->address ?? '' }}</textarea>
                                                <p class="blog-info color-secondary-a" id="address_error"> </p>
                                            </div>
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" id="country" name="country"
                                                    value="{{ auth()->user()->country ?? '' }}" placeholder="eg. Egypt">
                                                <p class="blog-info color-secondary-a" id="country_error"> </p>
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" id="city" name="city"
                                                    value="{{ auth()->user()->city ?? '' }}" placeholder="eg. tanta">
                                                <p class="blog-info color-secondary-a" id="city_error"> </p>

                                            </div>
                                            <div class="form-group">
                                                <label>Post code</label>
                                                <input type="number"class="form-control" id="postcode" name="postcode"
                                                    value="{{ auth()->user()->postcode ?? '' }}" placeholder="eg. 44688">
                                                <p class="blog-info color-secondary-a" id="postcode_error"> </p>

                                            </div>
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" class="form-control" id="state" name="state"
                                                    value="{{ auth()->user()->state ?? '' }}" placeholder="eg. Asia">
                                                <p class="blog-info color-secondary-a" id="state_error"> </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" id="change-address-btn"
                                                    class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--edit shipping address Modal -->
                        <div class="modal fade" id="editShippingAddressModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Shipping Address</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        @include('web.partials.ajax-messages')
                                        <form method="POST" id="change-shipping-address-form">
                                            @csrf
                                            <div class="form-group">
                                                <label>Shipping Address</label>
                                                <textarea class="form-control" name="saddress" id="saddress" rows="4" cols="50">{{ auth()->user()->saddress ?? '' }}</textarea>
                                                <p class="blog-info color-secondary-a" id="saddress_error"> </p>
                                            </div>
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" id="scountry"
                                                    name="scountry" value="{{ auth()->user()->scountry ?? '' }}"
                                                    placeholder="eg. Egypt">
                                                <p class="blog-info color-secondary-a" id="scountry_error"> </p>
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" name="scity" id="scity"
                                                    value="{{ auth()->user()->scity ?? '' }}" placeholder="eg. tanta">
                                                <p class="blog-info color-secondary-a" id="scity_error"> </p>

                                            </div>
                                            <div class="form-group">
                                                <label>Post code</label>
                                                <input type="number"class="form-control" name="spostcode" id="spostcode"
                                                    value="{{ auth()->user()->spostcode ?? '' }}" placeholder="eg. 44688">
                                                <p class="blog-info color-secondary-a" id="spostcode_error"> </p>

                                            </div>
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" class="form-control" name="sstate"
                                                    value="{{ auth()->user()->sstate ?? '' }}" placeholder="Asia">
                                                <p class="blog-info color-secondary-a" id="sstate_error"> </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" id="change-shipping-address-btn"
                                                    class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- My Account Area -->
@endsection

@push('scripts')
    <script>
        $('.success-msg').hide();
        $('#change-address-btn').click(function(e) {
            $('.success-msg').empty()
            $('#address_error').text('');
            $('#country_error').text('');
            $('#city_error').text('');
            $('#postcode_error').text('');
            $('#state_error').text('');

            e.preventDefault();
            let formData = $('#change-address-form').serialize();
            let id = "{{ auth()->user()->id }} ";
            // console.log(id);
            let url = "{{ route('billing.address', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('.success-msg').text(response.success)
                    $('.success-msg').show()
                    $('#address').val('');
                    $('#country').val('');
                    $('#city').val('');
                    $('#postcode').val('');
                    $('#state').val('');
                },
                error: function(xhr, status, error) {
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        $('#' + key + '_error').text(value[0]);
                    });
                }
            })
        });
    </script>
    <script>
        $('.success-msg').text('');
        $('.success-msg').hide();
        $('#change-shipping-address-btn').click(function(e) {
            $('#saddress_error').text('');
            $('#scountry_error').text('');
            $('#scity_error').text('');
            $('#spostcode_error').text('');
            $('#sstate_error').text('');
            e.preventDefault();
            var formData = $('#change-shipping-address-form').serialize();
            let id = "{{ auth()->user()->id }} ";
            let url = "{{ route('shipping.address', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('.success-msg').text(response.success)
                    $('.success-msg').show()
                    // $('#change-shipping-address-form')[0].reset();
                    $('#saddress').val('');
                    $('#scountry').val('');
                    $('#scity').val('');
                    $('#spostcode').val('');
                    $('#sstate').val('');
                },
                error: function(xhr, status, error) {
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        $('#' + key + '_error').text(value[0]);
                    });
                }
            })

        })
    </script>
    <style>
        .footer_area {
            z-index: -1;
        }
    </style>
@endpush
