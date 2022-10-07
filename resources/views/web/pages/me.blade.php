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