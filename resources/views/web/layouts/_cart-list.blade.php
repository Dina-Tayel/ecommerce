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
                    <img src="{{ asset('uploads/products/' . $item->model->img) }}"
                        alt="Product">
                </td>
                <td>
                    <a
                        href="{{ route('product.details', $item->model->slug) }}">{{ $item->name }}</a>
                </td>
                <td>${{ $item->price }}</td>
                <td>
                    <div class="quantity">
                        <input type="number" id="qty-input-{{ $item->rowId }}"
                            data-id="{{ $item->rowId }}" class="qty-text" step="1"
                            min="1" max="99" name="quantity"
                            value="{{ $item->qty }}">
                        <input type="hidden" id="product-stock-{{ $item->rowId }}"
                            data-id="{{ $item->rowId }}}}"
                            data-stock="{{ $item->model->stock }}">
                    </div>
                </td>
                <td>${{ $item->subtotal() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>