@extends('web.layouts.master')
@section('content')
    <!-- Quick View Modal Area -->
    <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="quickview_body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="quickview_pro_img">
                                        <img class="first_img" src="img/product-img/new-1-back.png" alt="">
                                        <img class="hover_img" src="img/product-img/new-1.png" alt="">
                                        <!-- Product Badge -->
                                        <div class="product_badge">
                                            <span class="badge-new">New</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="quickview_pro_des">
                                        <h4 class="title">Boutique Silk Dress</h4>
                                        <div class="top_seller_product_rating mb-15">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        <h5 class="price">$120.99 <span>$130</span></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia expedita
                                            quibusdam aspernatur, sapiente consectetur accusantium perspiciatis praesentium
                                            eligendi, in fugiat?</p>
                                        <a href="#">View Full Product Details</a>
                                    </div>
                                    <!-- Add to Cart Form -->
                                    <form class="cart" method="post">
                                        <div class="quantity">
                                            <input type="number" class="qty-text" id="qty" step="1"
                                                min="1" max="12" name="quantity" value="1">
                                        </div>
                                        <button type="submit" name="addtocart" value="5" class="cart-submit">Add to
                                            cart</button>
                                        <!-- Wishlist -->
                                        <div class="modal_pro_wishlist">
                                            <a href="wishlist.html"><i class="icofont-heart"></i></a>
                                        </div>
                                        <!-- Compare -->
                                        <div class="modal_pro_compare">
                                            <a href="compare.html"><i class="icofont-exchange"></i></a>
                                        </div>
                                    </form>
                                    <!-- Share -->
                                    <div class="share_wf mt-30">
                                        <p>Share with friends</p>
                                        <div class="_icon">
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick View Modal Area -->

    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Shop Grid</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Shop Grid</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <section class="shop_grid_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shop Top Sidebar -->
                    <div class="shop_top_sidebar_area d-flex flex-wrap align-items-center justify-content-between">
                        <div class="view_area d-flex">
                            <div class="grid_view">
                                <a href="shop-grid-left-sidebar.html" data-toggle="tooltip" data-placement="top"
                                    title="Grid View"><i class="icofont-layout"></i></a>
                            </div>
                            <div class="list_view ml-3">
                                <a href="shop-list-left-sidebar.html" data-toggle="tooltip" data-placement="top"
                                    title="List View"><i class="icofont-listine-dots"></i></a>
                            </div>
                        </div>
                        {{-- {{ dd(request()->query('sort'))}} --}}
                        {{-- {{dd($category)}} --}}
                        <select class="small right" id="sortBy">
                            <option selected>Default sort</option>
                            <option value="priceAsc" {{ request()->query('sort') == 'priceAsc' ? 'selected' : '' }}>price
                                Ascending to Descending</option>
                            <option value="priceDesc" {{ request()->query('sort') == 'priceDesc' ? 'selected' : '' }}>price
                                Descending to Ascending</option>
                            <option value="titleAsc" {{ request()->query('sort') == 'titleAsc' ? 'selected' : '' }}>
                                Alphabetical Ascending </option>
                            <option value="titleDesc" {{ request()->query('sort') == 'titleDesc' ? 'selected' : '' }}>
                                Alphabetical Descending</option>
                            <option value="discountAsc" {{ request()->query('sort') == 'discountAsc' ? 'selected' : '' }}>
                                Discount Ascending to Descending</option>
                            <option value="discountDesc"{{ request()->query('sort') == 'discountDesc' ? 'selected' : '' }}>
                                Discount Descending to Ascending</option>

                        </select>
                    </div>

                    <div class="shop_grid_product_area">
                        <div class="row justify-content-center">
                            {{-- @if (count($category->products) > 0)
                                @foreach ($category->products as $product) --}}

                            @if (count($products) > 0)
                                {{-- @foreach ($products as $product)
                                    <!-- Single Product -->
                                    <div class="col-9 col-sm-6 col-md-4 col-lg-3">
                                        <div class="single-product-area mb-30">
                                            <div class="product_image">
                                                <!-- Product Image -->
                                                <img class="normal_img" src="{{ $product->image_path }}" alt="">
                                                <img class="hover_img" src="img/product-img/new-2-back.png"
                                                    alt="">

                                                <!-- Product Badge -->
                                                <div class="product_badge">
                                                    <span>{{ $product->condition }}</span>
                                                </div>

                                                <!-- Wishlist -->
                                                <div class="product_wishlist">
                                                    <a href="wishlist.html"><i class="icofont-heart"></i></a>
                                                </div>

                                                <!-- Compare -->
                                                <div class="product_compare">
                                                    <a href="compare.html"><i class="icofont-exchange"></i></a>
                                                </div>
                                            </div>

                                            <!-- Product Description -->
                                            <div class="product_description">
                                                <!-- Add to cart -->
                                                <div class="product_add_to_cart">
                                                    <a href="#"><i class="icofont-shopping-cart"></i> Add to
                                                        Cart</a>
                                                </div>

                                                <!-- Quick View -->
                                                <div class="product_quick_view">
                                                    <a href="#" data-toggle="modal" data-target="#quickview"><i
                                                            class="icofont-eye-alt"></i> Quick View</a>
                                                </div>

                                                <p class="brand_name">{{ ucfirst($product->brand->title) }}</p>
                                                <a
                                                    href="{{ route('product.details', $product->slug) }}">{{ ucfirst($product->title) }}</a>
                                                <h6 class="product-price">{{ number_format($product->offer_price, 2) }}
                                                    @if ($product->discount > 0)
                                                        <span>{{ number_format($product->price, 2) }} </span>
                                                    @endif
                                                </h6>


                                            </div>
                                        </div>
                                    </div>
                                @endforeach --}}
                                @include('web.layouts._single-product')
                            @endif

                    


                        </div>
                    </div>
                    <div class="ajax-load text-center" style="display: none">
                        <img src="{{ asset('web/img/loader.gif') }}" class="text-center">

                    </div>
                    <!-- Shop Pagination Area -->
                    {{-- <div class="shop_pagination_area mt-30">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fa fa-angle-left"
                                            aria-hidden="true"></i></a>
                                </li>
                                {{ $category->products->links()}}
                            </ul>
                        </nav>
                    </div> --}}

                </div>
            </div>
            {{-- var url= window.location="{{ url(''. $route .'')}}/{{$category->slug}}?sort="+sort; --}}

        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $('#sortBy').change(function() {
            var sort = $(this).val();
            var url = window.location = "{{ url('' . $route . '') }}/{{ $category->slug }}?sort=" + sort;

            console.log(url);

        });
    </script>
    <script>
        function loadmoreData(page)
        {
            $.ajax({
                url:'?page='+page ,
                type:'get' ,
                beforeSend:function()
                {
                    $('.ajax-load').show();
                }

            })
        }
    </script>
@endpush