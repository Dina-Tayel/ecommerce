@extends('web.layouts.master')
@section('content')
    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Shop List</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Shop List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Breadcumb Area -->

    <section class="shop_grid_area section_padding_100">
        <div class="container">
            <form method="POST" action="{{ route('shop.fiter') }}" id="store_shop_form">
                <div class="row">
                    <div class="col-12 col-sm-5 col-md-4 col-lg-3">
                        <div class="shop_sidebar_area">
                            @if (request()->query('category'))
                                @php
                                    $filter_categories = explode(',', request()->query('category'));
                                @endphp
                            @endif
                            <!-- Single Widget -->
                            <div class="widget catagory mb-30">
                                <h6 class="widget-title">Product Categories</h6>
                                <div class="widget-desc">
                                    @foreach ($categories as $category)
                                        <!-- Single Checkbox -->
                                        <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                            @csrf
                                            <input type="checkbox" name="category[]" value="{{ $category->slug }}"
                                                @if (!empty($filter_categories) && in_array($category->slug, $filter_categories)) checked @endif
                                                onchange="this.form.submit();" class="custom-control-input"
                                                id="{{ $category->slug }}">
                                            <label class="custom-control-label"
                                                for="{{ $category->slug }}">{{ $category->title }} <span
                                                    class="text-muted"></span></label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            <!-- Single Widget -->
                            <div class="widget price mb-30">
                                <h6 class="widget-title">Filter by Price</h6>
                                <div class="widget-desc">
                                    <div class="slider-range">
                                        @if (request()->query('price'))
                                          @php
                                            $price =  explode('-',request()->query('price'))
                                          @endphp  
                                        @endif
                                        <div id="slider_range" data-min="{{ Helper::minPrice() }}"
                                            data-max="{{ Helper::maxPrice() }}" data-unit="$"
                                            class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                            data-value-min="{{(! empty($price[0]))  ? $price[0]  :  Helper::minPrice() }}"
                                            data-value-max="{{(! empty($price[1]) ) ? $price[1]  :  Helper::maxPrice() }}" data-label-result="Price:">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                tabindex="0"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                tabindex="0"></span>
                                        </div>
                                        <div class="d-flex mt-4">
                                            <input type="hidden" id="price_range" name="price_range"
                                                @if (!empty(request()->query('price'))) {{ request()->query('price') }} @endif>
                                            {{-- <div class="range-price">Price: {{ Helper::minPrice() }} -
                                                {{ Helper::maxPrice() }}</div> --}}
                                                {{-- <input type="text" id="amount" style="border: 0; width: 50%;" value="{{request()->query('price')  ? request()->query('price') : Helper::minPrice()-Helper::maxPrice() }} " readonly> --}}
                                                <input type="text" id="amount" style="border: 0; width: 50%;" value="{{! empty($price[0])  ? $price[0]  :  Helper::minPrice()  }}-{{! empty($price[1])  ? $price[1]  :  Helper::maxPrice()}} " readonly>
                                            
                                                <button type="submit" class="btn btn-sm btn-primary float-right"
                                                style="margin: 12px 0px 10px 0px ; height: 30px; line-height: 22px">filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Widget -->
                            <div class="widget color mb-30">
                                <h6 class="widget-title">Filter by Color</h6>
                                <div class="widget-desc">
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck6">
                                        <label class="custom-control-label black" for="customCheck6">Black <span
                                                class="text-muted">(9)</span></label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck7">
                                        <label class="custom-control-label pink" for="customCheck7">Pink <span
                                                class="text-muted">(6)</span></label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck8">
                                        <label class="custom-control-label red" for="customCheck8">Red <span
                                                class="text-muted">(8)</span></label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck9">
                                        <label class="custom-control-label purple" for="customCheck9">Purple <span
                                                class="text-muted">(4)</span></label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="checkbox" class="custom-control-input" id="customCheck10">
                                        <label class="custom-control-label orange" for="customCheck10">Orange <span
                                                class="text-muted">(7)</span></label>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Widget -->
                            <div class="widget brands mb-30">
                                <h6 class="widget-title">Filter by brands</h6>
                                <div class="widget-desc">
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck11">
                                        <label class="custom-control-label" for="customCheck11">Zara <span
                                                class="text-muted">(213)</span></label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck12">
                                        <label class="custom-control-label" for="customCheck12">Gucci <span
                                                class="text-muted">(65)</span></label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck13">
                                        <label class="custom-control-label" for="customCheck13">Addidas <span
                                                class="text-muted">(70)</span></label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck14">
                                        <label class="custom-control-label" for="customCheck14">Nike <span
                                                class="text-muted">(104)</span></label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="checkbox" class="custom-control-input" id="customCheck15">
                                        <label class="custom-control-label" for="customCheck15">Denim <span
                                                class="text-muted">(71)</span></label>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Widget -->
                            <div class="widget rating mb-30">
                                <h6 class="widget-title">Average Rating</h6>
                                <div class="widget-desc">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> <i
                                                    class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star"
                                                    aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i> <span
                                                    class="text-muted">(103)</span></a></li>

                                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> <i
                                                    class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star"
                                                    aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i> <span
                                                    class="text-muted">(78)</span></a></li>

                                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> <i
                                                    class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star"
                                                    aria-hidden="true"></i> <i class="fa fa-star-o"
                                                    aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i> <span
                                                    class="text-muted">(47)</span></a></li>

                                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> <i
                                                    class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o"
                                                    aria-hidden="true"></i> <i class="fa fa-star-o"
                                                    aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i> <span
                                                    class="text-muted">(9)</span></a></li>

                                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> <i
                                                    class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o"
                                                    aria-hidden="true"></i> <i class="fa fa-star-o"
                                                    aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i> <span
                                                    class="text-muted">(3)</span></a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Single Widget -->
                            <div class="widget size mb-30">
                                <h6 class="widget-title">Filter by Size</h6>
                                <div class="widget-desc">
                                    <ul>
                                        <li><a href="#">XS</a></li>
                                        <li><a href="#">S</a></li>
                                        <li><a href="#">M</a></li>
                                        <li><a href="#">L</a></li>
                                        <li><a href="#">XL</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-7 col-md-8 col-lg-9">
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
                            <select name="sortBy" onchange="this.form.submit();" class="small right" id="sortBy">
                                <option selected>Default sort</option>
                                <option value="price_Asc"
                                    {{ request()->query('sortBy') == 'price_Asc' ? 'selected' : '' }}>price
                                    Ascending to Descending</option>sortBy
                                <option value="price_Desc"
                                    {{ request()->query('sortBy') == 'price_Desc' ? 'selected' : '' }}>
                                    price
                                    Descending to Ascending</option>
                                <option value="title_Asc"
                                    {{ request()->query('sortBy') == 'title_Asc' ? 'selected' : '' }}>
                                    Alphabetical Ascending </option>
                                <option value="title_Desc"
                                    {{ request()->query('sortBy') == 'title_Desc' ? 'selected' : '' }}>
                                    Alphabetical Descending</option>
                                <option value="discount_Asc"
                                    {{ request()->query('sortBy') == 'discount_Asc' ? 'selected' : '' }}>
                                    Discount Ascending to Descending</option>
                                <option
                                    value="discount_Desc"{{ request()->query('sort') == 'discount_Desc' ? 'selected' : '' }}>
                                    Discount Descending to Ascending</option>

                            </select>
                        </div>

                        <div class="shop_grid_product_area">
                            <div class="row justify-content-center">
                                @foreach ($products as $product)
                                    <!-- Single Product -->
                                    <div class="col-9 col-sm-12 col-md-6 col-lg-4">
                                        <div class="single-product-area mb-30">
                                            <div class="product_image">
                                                <!-- Product Image -->
                                                <img class="normal_img" src="{{ $product->image_path }}" alt="">
                                                {{-- <img class="hover_img" src="img/product-img/new-8-back.png" alt=""> --}}

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
                                @endforeach

                            </div>
                        </div>
                        {{ $products->appends($_GET)->links('vendor.pagination.custom') }}


                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            const max_price =parseInt($('#slider_range').data('max')) ;
            const min_price =parseInt($('#slider_range').data('min')) ;
            let price_range = max_price + '-' + min_price;
            $("#slider_range").slider({
                range: true,
                max: max_price,
                min: min_price,
                values: [
                    $("#slider_range").data("value-min"),
                    $("#slider_range").data("value-max"),
                ],
                slide: function(event,ui) {
                    $("#amount").val(ui.values[0] + "-" + ui.values[1]);
                    $("#price_range").val(ui.values[0] + "-" + ui.values[1]);

                }
            })
        })
    </script>
@endpush
