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
                    <h5>Product Details</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">{{ $product->title }} Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Single Product Details Area -->
    <section class="single_product_details_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">

                            <!-- Carousel Inner -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a class="gallery_img" href="{{ $product->image_path }}" title="First Slide">
                                        <img class="d-block w-100" src="{{ $product->image_path }}" alt="First slide">
                                    </a>
                                    <!-- Product Badge -->
                                    <div class="product_badge">
                                        <span class="badge-new">{{ $product->condition }}</span>
                                    </div>
                                </div>
                                @foreach ($product->images as $image)
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="{{ $image->image_path }}" title="Second Slide">
                                            <img class="d-block w-100" src="{{ $image->image_path }}" alt="Second slide">
                                        </a>
                                        <!-- Product Badge -->
                                        <div class="product_badge">
                                            <span class="badge-new">{{ $product->condition }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Carosel Indicators -->
                            <ol class="carousel-indicators">
                                <li class="active" data-target="#product_details_slider" data-slide-to="0"
                                    style="background-image: url({{ $product->image_path }});">
                                </li>
                                @foreach ($product->images as $key => $image)
                                    <li class="active" data-target="#product_details_slider"
                                        data-slide-to="{{ $key + 1 }}"
                                        style="background-image: url({{ $image->image_path }});">
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- Single Product Description -->
                <div class="col-12 col-lg-6">
                    <div class="single_product_desc">
                        <h4 class="title mb-2">{{ $product->title }}</h4>
                        <div class="single_product_ratings mb-2">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <span class="text-muted">(8 Reviews)</span>
                        </div>
                        {{-- <h4 class="price mb-4">$120.99 <span>$190</span></h4> --}}
                        {{-- <h4 class="price mb-4">{{ number_format($product->offer_price, 2) }}
                            @if ($product->discount > 0)
                                <span>{{ number_format($product->price, 2) }} </span>
                            @endif
                        </h4> --}}
                        <h4 class="price mb-4" id="size_price">{{ number_format($product->offer_price, 2) }}
                            @if ($product->discount > 0)
                                <span>{{ number_format($product->price, 2) }} </span>
                            @endif
                        </h4>
                        <!-- Overview -->
                        <div class="short_overview mb-4">
                            <h6>Overview</h6>
                            <p> {!! $product->summery !!}</p>
                        </div>

                        <!-- Color Option -->
                        <div class="widget p-0 color mb-3">
                            <h6 class="widget-title">Color</h6>
                            <div class="widget-desc d-flex">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="customRadio"
                                        class="custom-control-input">
                                    <label class="custom-control-label black" for="customRadio1"></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="customRadio"
                                        class="custom-control-input">
                                    <label class="custom-control-label pink" for="customRadio2"></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio3" name="customRadio"
                                        class="custom-control-input">
                                    <label class="custom-control-label red" for="customRadio3"></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio4" name="customRadio"
                                        class="custom-control-input">
                                    <label class="custom-control-label purple" for="customRadio4"></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio5" name="customRadio"
                                        class="custom-control-input">
                                    <label class="custom-control-label white" for="customRadio5"></label>
                                </div>
                            </div>
                        </div>

                        @if ($product_attributes->count() > 0)
                            <!-- Size Option -->
                            <div class="widget p-0 size mb-3">
                                <h6 class="widget-title">Size</h6>
                                <div class="widget-desc" style="display: block">
                                    <ul>
                                        @foreach ($product_attributes as $product_attribute)
                                            <li>
                                                <a href="#" class="size_option" id="{{ $product_attribute->id }}"
                                                    data-original_price="{{ number_format($product_attribute->original_price, 2) }}"
                                                    data-offer_price="{{ number_format($product_attribute->offer_price, 2) }}">
                                                    {{ $product_attribute->size }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <!-- Add to Cart Form -->
                        <form class="cart clearfix my-5 d-flex flex-wrap align-items-center" method="post">
                            <div class="quantity">
                                <input type="number" id="qty-id" class="qty-text form-control" id="qty2"
                                    step="1" min="1" max="12" name="quantity" value="1">
                            </div>
                            <button type="submit" name="addtocart" value="5"
                                class="btn btn-primary mt-1 mt-md-0 ml-1 ml-md-3">Add to cart</button>
                        </form>

                        <!-- Others Info -->
                        <div class="others_info_area mb-3 d-flex flex-wrap">
                            <a class="add_to_wishlist" href="wishlist.html"><i class="fa fa-heart"
                                    aria-hidden="true"></i> WISHLIST</a>
                            <a class="add_to_compare" href="compare.html"><i class="fa fa-th" aria-hidden="true"></i>
                                COMPARE</a>
                            <a class="share_with_friend" href="#"><i class="fa fa-share" aria-hidden="true"></i>
                                SHARE WITH FRIEND</a>
                        </div>

                        <!-- Size Guide -->
                        <div class="sizeguide">
                            <h6>Size Guide</h6>
                            <div class="size_guide_thumb d-flex">
                                @php
                                    $images = explode(',', $product->size_guide);
                                @endphp
                                @foreach ($images as $image)
                                    <a class="size_guide_img" href="{{ asset('uploads/products/size_guide/' . $image) }}"
                                        style="background-image: url({{ asset('uploads/products/size_guide/' . $image) }});">
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_details_tab section_padding_100_0 clearfix">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                            <li class="nav-item">
                                <a href="#description" class="nav-link active" data-toggle="tab"
                                    role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a href="#reviews" class="nav-link" data-toggle="tab" role="tab">Reviews <span
                                        class="text-muted">({{$product->reviews->count()}})</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="tab" role="tab">Additional
                                    Information</a>
                            </li>
                            <li class="nav-item">
                                <a href="#refund" class="nav-link" data-toggle="tab" role="tab">Return &amp;
                                    Cancellation</a>
                            </li>
                        </ul>
                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="description">
                                <div class="description_area">
                                    <h5>Description</h5>
                                    <p>{!! $product->desc !!}</p>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="reviews">
                                <div class="reviews_area">
                                    <ul>
                                        <li>
                                            @if ($product->reviews->count() > 0)
                                                @foreach ( $product->reviews as $key=> $review)
                                                    
                                                <div class="single_user_review mb-15">
                                                    <div class="review-rating">
                                                        @for ($i=0 ; $i<5 ; $i++)
                                                        @if ($review->rate > 0)
                                          
                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                            @else
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        @endif
                                                        @endfor
                                                        <span>{{ $review->reason}}</span>
                                                    </div>
                                                    <div class="review-details">
                                                        <p>by <a href="#">{{ $review->user->username}}</a> on <span>{{ Carbon\Carbon::parse($review->created_at)->format('m, D Y')}}</span>
                                                        </p>
                                                        <p>{{ $review->review}}</p>
                                                    </div>
                                                </div>
                                                @endforeach
                                            {{-- <div class="single_user_review mb-15">
                                                <div class="review-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <span>for Design</span>
                                                </div>
                                                <div class="review-details">
                                                    <p>by <a href="#">Designing World</a> on <span>12 Sep 2019</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="single_user_review">
                                                <div class="review-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <span>for Value</span>
                                                </div>
                                                <div class="review-details">
                                                    <p>by <a href="#">Designing World</a> on <span>12 Sep 2019</span>
                                                    </p>
                                                </div>
                                            </div> --}}
                                            @endif
                                        </li>
                                    </ul>
                                </div>

                                <div class="submit_a_review_area mt-50">
                                    <h4>Submit A Review</h4>
                                    @include('web.partials.ajax-messages')
                                    @auth
                                        <form action="" method="post" id="review-form">
                                            @csrf
                                            <div class="form-group">
                                                <span>Your Ratings</span>
                                                <div class="stars" id="rate">
                                                    <input type="radio" name="rate" class="star-1" id="star-1"
                                                        value="1" {{ old('rate') == '1' ? 'selected' : '' }}>
                                                    <label class="star-1" for="star-1">1</label>
                                                    <input type="radio" name="rate" class="star-2" id="star-2"
                                                        value="2" {{ old('rate') == '2' ? 'selected' : '' }}>
                                                    <label class="star-2" for="star-2">2</label>
                                                    <input type="radio" name="rate" class="star-3" id="star-3"
                                                        value="3" {{ old('rate') == '3' ? 'selected' : '' }}>
                                                    <label class="star-3" for="star-3">3</label>
                                                    <input type="radio" name="rate" class="star-4" id="star-4"
                                                        value="4" {{ old('rate') == '4' ? 'selected' : '' }}>
                                                    <label class="star-4" for="star-4">4</label>
                                                    <input type="radio" name="rate" class="star-5" id="star-5"
                                                        value="5" {{ old('rate') == '5' ? 'selected' : '' }}>
                                                    <label class="star-5" for="star-5">5</label>
                                                    <span></span>
                                                </div>
                                                <p class="text-danger" id="rate_error"></p>

                                            </div>
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <div class="form-group">
                                                <label for="options">Reason for your rating</label>
                                                <select name="reason" class="form-control small right py-0 w-100"
                                                    id="reason">
                                                    <option selected disabled>selcet reason for rating</option>
                                                    <option value="quality"
                                                       >Quality</option>
                                                    <option value="value">
                                                        Value</option>
                                                    <option value="design" >
                                                        Design</option>
                                                    <option value="price" >
                                                        Price</option>
                                                    <option value="others" >
                                                        Others</option>
                                                </select>

                                                <p class="text-danger" id="reason_error"></p>

                                            </div>
                                            <div class="form-group">
                                                <label for="comments">Comments</label>
                                                <textarea class="form-control" name="review" id="review" rows="5" data-max-length="150"></textarea>

                                                <p class="text-danger " id="review_error"></p>

                                            </div>
                                            <button type="submit" class="btn btn-primary" id="review-form-btn">Submit
                                                Review</button>
                                        </form>
                                    @else
                                        <p class="py-2"> Tou need to login for writing review . <a
                                                href="{{ route('login','user') }}">Click Here ! </a> to login</p>
                                        @endif
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="addi-info">
                                    <div class="additional_info_area">
                                        <h5>Additional Info</h5>
                                        <p>{!! $product->additional_info !!}</p>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="refund">
                                    <div class="refund_area">
                                        <h6>Return Policy</h6>
                                        {!! $product->return_cancellation !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Single Product Details Area End -->

        <!-- Related Products Area -->
        <section class="you_may_like_area section_padding_0_100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading new_arrivals">
                            <h5>You May Also Like</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="you_make_like_slider owl-carousel">
                            @if ($product)
                                @foreach ($product->related_projects as $related_product)
                                    @if ($product->id !== $related_product->id)
                                        <!-- Single Product -->
                                        <div class="single-product-area">
                                            <div class="product_image">
                                                <!-- Product Image -->
                                                <img class="normal_img" src="{{ $related_product->image_path }}"
                                                    alt="">
                                                {{-- <img class="hover_img" src="img/product-img/new-1.png" alt=""> --}}

                                                <!-- Product Badge -->
                                                <div class="product_badge">
                                                    <span>{{ $related_product->condition }}</span>
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
                                                    <a href="#"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                                                </div>

                                                <!-- Quick View -->
                                                <div class="product_quick_view">
                                                    <a href="#" data-toggle="modal" data-target="#quickview"><i
                                                            class="icofont-eye-alt"></i> Quick View</a>
                                                </div>

                                                <p class="brand_name">{{ ucfirst($related_product->brand->title) }}</p>
                                                <a
                                                    href="{{ route('product.details', $related_product->slug) }}">{{ ucfirst($product->title) }}</a>
                                                <h6 class="product-price">
                                                    {{ number_format($related_product->offer_price, 2) }}
                                                    @if ($related_product->discount > 0)
                                                        <span>{{ number_format($related_product->price, 2) }} </span>
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related Products Area -->
    @endsection
    @push('scripts')
        <script>
            $(document).on('click', '.size_option', function() {
                var original_price = $(this).data('original_price');
                var offer_price = $(this).data('offer_price');
                var html_option = offer_price;
                if (offer_price > 0) {
                    html_option += "<span> " + original_price + " </span>"
                    $('#size_price').html(html_option);
                } else {
                    $('#size_price').html(original_price)

                }
            })
        </script>
        <script>
            $('.success-msg').hide();
            $(document).on('click', '#review-form-btn', function(e) {
                e.preventDefault();
                $('#rate_error').text('');
                $('#review_error').text('');
                $('#reason_error').text('');
                var formData = $('#review-form').serialize();
                var route = "{{ route('product.review') }}";
                var token = "{{ csrf_token() }}";
                $.ajax({
                    data: formData,
                    url: route,
                    type: 'post',
                    success: function(response) {
                        $('.success-msg').show('');
                        $('.success-msg').text(response['success']);
                        // $('#review').val('');
                        // $('#rate').val('');
                        // $("#reason option").prop("selected", false);
                        // $("#reason").trigger("change");
                        $("#review-form")[0].reset();

                    },
                    error: function(xhr, response, status) {
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            $('#' + key + '_error').text(value[0]);
                        })
                    }
                })
            })
        </script>
    @endpush
