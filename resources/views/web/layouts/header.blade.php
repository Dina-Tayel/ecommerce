<div>

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
                                <li><a href="#">Shop</a>
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
                                <li><a href="#">Blog</a>
                                    <ul class="dropdown">
                                        <li><a href="blog-with-left-sidebar.html">Blog Left Sidebar</a></li>
                                        <li><a href="blog-with-right-sidebar.html">Blog Right Sidebar</a></li>
                                        <li><a href="blog-with-no-sidebar.html">Blog No Sidebar</a></li>
                                        <li><a href="single-blog.html">Single Blog</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Elements</a>
                                    <div class="megamenu">
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="accordian.html">- Accordions</a></li>
                                            <li><a href="alerts.html">- Alerts</a></li>
                                            <li><a href="badges.html">- Badges</a></li>
                                            <li><a href="blockquotes.html">- Blockquotes</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="breadcrumb.html">- Breadcrumbs</a></li>
                                            <li><a href="buttons.html">- Buttons</a></li>
                                            <li><a href="forms.html">- Forms</a></li>
                                            <li><a href="gallery.html">- Gallery</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="heading.html">- Headings</a></li>
                                            <li><a href="icon-fontawesome.html">- Icon FontAwesome</a></li>
                                            <li><a href="icon-icofont.html">- Icon Ico Font</a></li>
                                            <li><a href="labels.html">- Labels</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="modals.html">- Modals</a></li>
                                            <li><a href="pagination.html">- Pagination</a></li>
                                            <li><a href="progress-bars.html">- Progress Bars</a></li>
                                            <li><a href="tables.html">- Tables</a></li>
                                        </ul>
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
                            <div class="cart--btn"><i class="icofont-cart"></i> 
                                <span class="cart_quantity" id="cart_counter">{{Cart::instance('shopping')->count()}}</span>
                            </div>

                            <!-- Cart Dropdown Content -->
                            <div class="cart-dropdown-content">
                                <ul class="cart-list">
                                    {{-- {{Cart::instance('shopping')->content() }} --}}
                                    @foreach (Cart::instance('shopping')->content() as $item )
                                    <li>
                                        <div class="cart-item-desc">
                                            <a href="#" class="image">
                                                <img src="{{ asset('uploads/products/'.$item->model->img) }}"
                                                    class="cart-thumb" alt="">
                                            </a>
                                            <div>
                                                <a href="{{route('product.details',$item->model->slug)}}">{{ $item->name}}</a>
                                                <p>{{ $item->qty}} x - <span class="price">${{ $item->price}}</span></p>
                                            </div>
                                        </div>
                                        <span  class="dropdown-product-remove cart-delete"  data-id="{{ $item->rowId }}"
                                        data-product-price="{{ $item->price}}"
                                         data-product-qty="{{ $item->qty}}" data-product-id="{{$item->rowId}}" 
                                         id="cart-delete-btn{{$item->id}}" > <i class="icofont-bin"></i></span>
                                        {{-- <form action="" id="cart-delete-form">
                                            @csrf
                                            <button type="submit" class="dropdown-product-remove cart-delete" data-product-price="{{ $item->price}}" data-product-qty="{{ $item->qty}}" data-product-id="{{$item->rowId}}" id="cart-delete-btn{{$item->id}}"  ><i class="icofont-bin"></i></button>
                                        </form> --}}
                                    </li>
                                    @endforeach
                                 
                                  
                                </ul>
                                <div class="cart-pricing my-4">
                                    <ul>
                                        <li>
                                            <span>Sub Total:</span>
                                            <span>$ {{Cart::subtotal() }}</span>
                                        </li>
                                        <li>
                                            <span>Total pieces Count:</span>
                                            <span>{{Cart::count() }}</span>
                                        </li>
                                        <li>
                                            <span>Total:</span>
                                            <span>{{Cart::subtotal() }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cart-box d-flex">
                                    <a href="{{ route('cart')}}" class="btn btn-success btn-sm mr-1 ">Cart</a>
                                    <a href="checkout-1.html" class="btn btn-primary btn-sm ml-1">Checkout</a>
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
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i
                                                class="icofont-logout"></i> Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                @else
                                    <a href="{{ route('user.login') }}">
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
</div>
