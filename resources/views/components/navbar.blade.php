

    <!-- Main Menu -->
    <div class="bigshop-main-menu">
        <div class="container">
            <div class="classy-nav-container breakpoint-off">
                <nav class="classy-navbar" id="bigshopNav">

                    <!-- Nav Brand -->
                    <a href="index.html" class="nav-brand"><img src="{{ asset('web/img/core-img/logo.png') }}"
                            alt="logo"></a>

                    <!-- Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Close -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav -->
                        <div class="classynav">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a>

                                </li>
                                <li><a href="{{ route('shop')}}">Shop</a>
                                </li>
                                <li><a href="#">Pages</a>
                                    <div class="megamenu">
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="about-us.html">- About Us</a></li>
                                            <li><a href="faq.html">- FAQ</a></li>
                                            <li><a href="contact.html">- Contact</a></li>
                                            <li><a href="login.html">- Login &amp; Register</a></li>
                                            <li><a href="404.html">- 404</a></li>
                                            <li><a href="500.html">- 500</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="my-account.html">- Dashboard</a></li>
                                            <li><a href="order-list.html">- Orders</a></li>
                                            <li><a href="downloads.html">- Downloads</a></li>
                                            <li><a href="addresses.html">- Addresses</a></li>
                                            <li><a href="account-details.html">- Account Details</a></li>
                                            <li><a href="coming-soon.html">- Coming Soon</a></li>
                                        </ul>
                                        <div class="single-mega cn-col-2">
                                            <div class="megamenu-slides owl-carousel">
                                                <a href="shop-grid-left-sidebar.html">
                                                    <img src="{{ asset('web/img/bg-img/mega-slide-2.jpg') }}"
                                                        alt="">
                                                </a>
                                                <a href="shop-list-left-sidebar.html">
                                                    <img src="{{ asset('web/img/bg-img/mega-slide-1.jpg') }}"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                               
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Hero Meta -->
                    <div class="hero_meta_area ml-auto d-flex align-items-center justify-content-end">
                        <!-- Search -->
                        <div class="search-area">
                            <div class="search-btn"><i class="icofont-search"></i></div>
                            <!-- Form -->
                            <div class="search-form">
                                <input type="search" class="form-control" placeholder="Search">
                                <input type="submit" class="d-none" value="Send">
                            </div>
                        </div>

                        <!-- Wishlist -->
                        <div class="wishlist-area">
                            <a href="wishlist.html" class="wishlist-btn"><i class="icofont-heart"></i></a>
                        </div>

                        <!-- Cart -->
                        <div class="cart-area">
                            <div class="cart--btn"><i class="icofont-cart"></i> <span class="cart_quantity" id="cart-countr">{{Cart::instance('shopping')->count()}}</span>
                            </div>

                            <!-- Cart Dropdown Content -->
                            <div class="cart-dropdown-content">
                                <ul class="cart-list">
                                    <li>
                                        <div class="cart-item-desc">
                                            <a href="#" class="image">
                                                <img src="{{ asset('web/img/product-img/top-1.png') }}"
                                                    class="cart-thumb" alt="">
                                            </a>
                                            <div>
                                                <a href="#">Kid's Fashion</a>
                                                <p>1 x - <span class="price">$32.99</span></p>
                                            </div>
                                        </div>
                                        <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                                    </li>
                                    <li>
                                        <div class="cart-item-desc">
                                            <a href="#" class="image">
                                                <img src="{{ asset('web/img/product-img/best-4.png') }}"
                                                    class="cart-thumb" alt="">
                                            </a>
                                            <div>
                                                <a href="#">Headphone</a>
                                                <p>2x - <span class="price">$49.99</span></p>
                                            </div>
                                        </div>
                                        <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                                    </li>
                                </ul>
                                <div class="cart-pricing my-4">
                                    <ul>
                                        <li>
                                            <span>Sub Total:</span>
                                            <span>$822.96</span>
                                        </li>
                                        <li>
                                            <span>Shipping:</span>
                                            <span>$30.00</span>
                                        </li>
                                        <li>
                                            <span>Total:</span>
                                            <span>$856.63</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cart-box">
                                    <a href="checkout-1.html" class="btn btn-primary d-block">Checkout</a>
                                </div>
                            </div>
                        </div>

                        <!-- Account -->
                        <div class="account-area">
                            <div class="user-thumbnail">
                                @auth
                                    @if (auth()->user()->img)
                                        <img src="{{ asset('uploads/users/' . auth()->user()->img) }}">
                                    @else
                                        <img src="{{ Helper::userDefaultImage() }}" alt="">
                                    @endif
                                    @else
                                    <img src="{{ Helper::userDefaultImage() }}" alt="">

                                @endauth


                            </div>
                            <ul class="user-meta-dropdown">
                                @auth
                                    <li class="user-title"><span>Hello,</span>{{ auth()->user()->fullname }}</li>
                                    <li><a href="{{ route('user.dashboard') }}">My Account</a></li>
                                    <li><a href="{{ route('user.order') }}">Orders List</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="#"
                                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i
                                                class="icofont-logout"></i> Logout</a></li>
                                    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form> --}}
                                    @if (auth('web')->check())

                                    <form id="logout-form" action="{{ route('logout', 'web') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                    @endif
                                @else
                                    <a href="{{ route('user.login','user') }}">
                                        <li class="user-title"><span>Login & Register</span> </li>
                                    </a>

                                @endauth

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

