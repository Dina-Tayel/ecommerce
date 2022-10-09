$('.cart-delete').click(function(e) {
    e.preventDefault();
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


    // alert(product_id);

})




$.ajax({
    url : route ,
    type :'DELETE',
    data:{
        _token : token ,
        product_id : row_id,
    },success:function(reponse){
        $('body #cart_counter').html(reponse['cart_count']);
        $('body #header_ajax').html(reponse['header']);
        if (reponse['status']) {
            $('#' + id).remove();
            swal({
                title: "Good job!",
                text: reponse['message'],
                icon: "success",
                button: "Ok",
            });



        }
    }

})


$('.qty-text').click(function(){
    var row_id =$(this).data('id');
    var spinner = $(this);
    var input=spinner.closest('div.quantity').find('input[type="number"]');
    if(input.val() ==1 )
    {
        return false ;
    }else{

        var newVal=parseFloat( spinner.val()) ;
        $('#qty-input-'+row_id).val(newVal);
    }
    var pro = $('#qty-input-'+row_id).val();
    
    console.log(pro);

})














































$('.dropdown-product-remove').click(function() {
    var id = $('.product_row').data('id');
    var row_id = $(this).data('id');
    var route = "{{ route('cart.delete') }}";
    var token = "{{ csrf_token() }}";
    $.ajax({
        url: route,
        type: 'DELETE',
        data: {
            _token: token,
            product_id: row_id,
        },
        success: function(reponse) {
            $('body #cart_counter').html(reponse['cart_count']);
            $('body #header_ajax').html(reponse['header']);
            if (reponse['status']) {
                $('#' + id).remove();
                swal({
                    title: "Good job!",
                    text: reponse['message'],
                    icon: "success",
                    button: "Ok",
                });
            }
        }

    })

})

$route = 'products-cat' ;
        $sort = $request->get('sort') ?? null ;
        $item = explode('_', $sort) ;
        $array = ['title', 'price', 'discount' ,'Asc', 'Desc'] ;
        if (in_array($item[0], $array) && in_array($item[1], $array)) {
            $products = Product::active()->when($request->has('sort'), function ($query) use ($item) {
                $query->orderBy($item[0], $item[1]);
            })->where(['category_id' => $category->id])->get();

        } else {
            $products = Product::active()->where(['category_id' => $category->id])->get();
        }
        return view('web.pages.products.cat-products', compact('category', 'products', 'route'));