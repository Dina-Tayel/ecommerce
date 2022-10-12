<div class="col-12">
    <div class="cart-table">
        {{-- <div class="table-responsive" id="cart_list"> --}}
        <div class="table-responsive">
            <table class="table table-bordered mb-30">
                <thead>
                    <tr>
                        <th scope="col"><i class="icofont-ui-delete"></i></th>
                        <th scope="col">Image</th>
                        <th scope="col">Product</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                        <tr class="product_row" data-id="{{ $item->rowId }}" id="{{ $item->rowId }}">
                            <th scope="row">
                                <i class="icofont-close cart_list_delete" data-id="{{ $item->rowId }}"></i>
                            </th>
                            <td>
                                <img src="{{ asset('uploads/products/' . $item->model->img) }}" alt="Product">
                            </td>
                            <td>
                                <a href="{{ route('product.details', $item->model->slug) }}">{{ $item->name }}</a>
                            </td>
                            <td>${{ number_format($item->price , 2)}}</td>
                            <td>
                                <div class="quantity">
                                    <input type="number" id="qty-input-{{ $item->rowId }}"
                                        data-id="{{ $item->rowId }}" class="qty-text" step="1" min="1"
                                        max="99" name="quantity" value="{{ $item->qty }}">
                                    <input type="hidden" id="product-stock-{{ $item->rowId }}"
                                        data-id="{{ $item->rowId }}}}" data-stock="{{ $item->model->stock }}">
                                </div>
                            </td>
                            <td>${{ $item->subtotal() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-12 col-lg-6">
    <div class="cart-apply-coupon mb-30">
        <h6>Have a Coupon?</h6>
        <p>Enter your coupon code here &amp; get awesome discounts!</p>
        <!-- Form -->
        @include('web.partials._session_messages')
        <div class="coupon-form">
            <form action="{{ route('coupon.add') }}" method="POST" id="coupon-form">
                @csrf
                <input type="text" name="coupon" class="form-control" id="coupon-name"
                    placeholder="Enter Your Coupon Code">
                <button type="submit" class="btn btn-primary coupon-btn">Apply Coupon</button>
            </form>
        </div>
    </div>
</div>
@if (Cart::instance('shopping')->count() > 0)
    <div class="col-12 col-lg-5">
        <div class="cart-total-area mb-30">
            <h5 class="mb-3">Cart Totals</h5>
            <div class="table-responsive">
                <table class="table mb-3">
                    <tbody>
                        <tr>
                            <td>Sub Total</td>
                            <td>${{ Cart::subtotal() }}</td>
                        </tr>
                        @if (Session::has('coupon'))
                            <tr>
                                <td>save Amount</td>
                                <td>${{ number_format(Session::get('coupon')['value'], 2) }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td>Total</td>
                            <td>$
                                {{ Session::has('coupon') ? number_format(str_replace(',', '', Cart::subtotal()) - Session::get('coupon')['value']) : Cart::subtotal() }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="{{ route('checkout') }}" class="btn btn-primary d-block">Proceed To Checkout</a>
        </div>
    </div>
@endif
