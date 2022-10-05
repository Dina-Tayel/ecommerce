@foreach ($products as $product)
    <!-- Single Product -->
    <div class="col-9 col-sm-6 col-md-4 col-lg-3">
        <div class="single-product-area mb-30">
            <div class="product_image">
                <!-- Product Image -->
                <img class="normal_img" src="{{ $product->image_path }}" alt="">
                <img class="hover_img" src="img/product-img/new-2-back.png" alt="">

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
                    <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i> Quick
                        View</a>
                </div>

                <p class="brand_name">{{ ucfirst($product->brand->title) }}</p>
                <a href="{{ route('product.details', $product->slug) }}">{{ ucfirst($product->title) }}</a>
                <h6 class="product-price">{{ number_format($product->offer_price, 2) }}
                    @if ($product->discount > 0)
                        <span>{{ number_format($product->price, 2) }} </span>
                    @endif
                </h6>


            </div>
        </div>
    </div>
@endforeach
