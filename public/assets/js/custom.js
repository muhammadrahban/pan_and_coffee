$(Document).ready(function () {

    $(".quantity__minus").click(function (e) {
        e.preventDefault();
        var input = $(this).closest('.quantity').find('.quantity__input');
        var value = input.val();
        if (value > 1) {
            value--;
        }
        input.val(value);
    });

    $(".quantity__plus").click(function (e) {
        e.preventDefault();
        var input = $(this).closest('.quantity').find('.quantity__input');
        var value = input.val();
        value++;
        input.val(value);
    });

    $('.add-to-cart').on('click', function (e) {
        e.preventDefault();

        var productId = $(this).data('product-id');
        var quantity = $(this).closest('.my-cardbody').find('.quantity__input').val();
        var route = $(this).data('route');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: route,
            method: 'POST',
            data: {
                product_id: productId,
                quantity: quantity
            },
            success: function (response) {
                console.log(response);
                window.location.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    var cartOpen = false;

    $('body').on('click', '.js-toggle-cart', toggleCart);
    $('body').on('click', '.js-add-product', addProduct);
    $('body').on('click', '.js-remove-product', removeProduct);


    function toggleCart(e) {
        e.preventDefault();
        if (cartOpen) {
            closeCart();
            return;
        }
        openCart();
    }

    function openCart() {
        $.ajax({
            url: '/cart-list',
            method: 'GET',
            success: function (response) {
                if(response.data.length > 0){
                    $('.js-cart-empty').addClass('hide');
                }
                $('.js-cart-product-template').html();
                response.data.forEach(function(item){
                    var data = '<div class="d-flex p-2 align-items-center products">';
                        data += '<img src="'+ item.image +'" style="width: 50px; height: 50px; border-radius: 50%;">';
                        data += '<div class="d-flex flex-column pl-1" style="width: 70%">';
                        data += '<h4 class="m-0 p-0" style="font-size:15px;">'+ item.title +'</h4>';
                        data += '<p class="m-0 p-0">'+ item.quantity +' x $'+ (item.price * item.quantity) +'</p>';
                        data += '</div>';
                        data += '<button class="btn js-remove-product" data-id="'+item.id+'" style="color: rgb(231, 176, 176)">X</button>';
                        data += '</div>';
                    $('.js-cart-product-template').append(data);
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
        cartOpen = true;
        $('body').addClass('open');
    }

    function closeCart() {
        cartOpen = false;
        $('body').removeClass('open');
    }

    function addProduct(e) {
        e.preventDefault();
        openCart();
        $('.js-cart-empty').addClass('hide');
        var product = $('.js-cart-product-template').html();
        $('.js-cart-products').prepend(product);
        numberOfProducts++;
    }

    function removeProduct(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: '/cart-remove/'+id,
            method: 'GET',
            success: function (response) {
                console.log(response);
                $(this).closest('.products').remove();
                window.location.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

});
