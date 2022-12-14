<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Bigshop | Responsive E-commerce Template</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('web/img/core-img/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('web/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/classy-nav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/icofont.min.css') }}">


    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('web/assets/css/style.css') }}">
    <!-- auto search CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    @yield('styles')
</head>

<body>
    <!-- Pre
        ader -->
    <div id="preloader">
        <div class="spinner-grow" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- Header Area -->
    <header class="header_area" id="header_ajax">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-6">
                        <div class="welcome-note">
                            <span class="popover--text" data-toggle="popover"
                                data-content="Welcome to Bigshop ecommerce template."><i
                                    class="icofont-info-square"></i></span>
                            <span class="text">Welcome to Bigshop ecommerce template.</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="language-currency-dropdown d-flex align-items-center justify-content-end">
                            <!-- Language Dropdown -->
                            <div class="language-dropdown">
                                <div class="dropdown">
                                    <a class="btn btn-sm dropdown-toggle" href="#" role="button"
                                        id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        English
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                        <a class="dropdown-item" href="#">Bangla</a>
                                        <a class="dropdown-item" href="#">Arabic</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Currency Dropdown -->
                            <div class="currency-dropdown">
                                <div class="dropdown">
                                    <a class="btn btn-sm dropdown-toggle" href="#" role="button"
                                        id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        $ USD
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                        <a class="dropdown-item" href="#">??? BDT</a>
                                        <a class="dropdown-item" href="#">??? Euro</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('web.layouts.header')
    </header>
    <!-- Header Area End -->
    <div id="div-content">

        @yield('content')
    </div>

    <!-- Footer Area -->

    <x-footer></x-footer>

    <!-- Footer Area -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{ asset('web/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/classy-nav.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/scrollup.js') }}"></script>
    <script src="{{ asset('web/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/jarallax.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/jarallax-video.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('web/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/active.js') }}"></script>
    {{-- autosearch --}}

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <!-- auto-search-->
    <script>
        $(document).ready(function() {
            var route = "{{ route('autosearch') }}";
            $('#search_text').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: route,
                        dataType: 'JSON',
                        data: {
                            term: request.term,
                        },
                        success: function(data) {
                            response(data)
                        }
                    });
                },
                minLength: 1,
            });
        });
    </script>
    <script>
        // <!---------------- delete from cart-------------->
        $(document).on('click', '.cart-delete', function(e) {
            var product_id = $(this).data('product-id');
            var product_price = $(this).data('product-price');
            var product_qty = $(this).data('product-qty');
            var token = "{{ csrf_token() }}";
            var route = "{{ route('cart.delete') }}";
            $.ajax({
                url: route,
                type: 'DELETE',
                data: {
                    _token: token,
                    product_id: product_id,
                    product_price: product_price,
                    product_qty: product_qty,
                },
                success: function(data) {
                    $('body #cart_counter').html(data['cart_count']);
                    $('body #header_ajax').html(data['header']);
                    $('body #cart_list').html(data['cart_list']);
                    $('#' + product_id).remove();

                    if (data['status']) {
                        swal({
                            title: "Good job!",
                            text: data['message'],
                            icon: "success",
                            button: "Ok",
                        });



                    }
                }
            })


        });
    </script>


    @stack('scripts')
</body>

</html>
