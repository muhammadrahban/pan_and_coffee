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
        numberOfProducts--;
        $(this).closest('.js-cart-product').hide(250);
        if (numberOfProducts == 0) {
            $('.js-cart-empty').removeClass('hide');
        }
    }

});
