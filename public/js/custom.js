$(document).ready(function () {
    $('.addToCartBtn').click(function (e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.product_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'prod_id': prod_id,
            },
            success: function (response) {
                alert(response.status);
            }
        });
    });

    // $('.increment-btn').click(function (e) {
    //     e.preventDefault();

    //     var inc_value = $(this).closest('.product_data').find('.qty-input').val();
    //     var value = parseInt(inc_value, 10);
    //     value = isNaN(value) ? 0 : value;
    //     if (value < 10) {
    //         value++;
    //         $(this).closest('.product_data').find('.qty-input').val(value);
    //     }
    // });

    // $('.decrement-btn').click(function (e) {
    //     e.preventDefault();

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     var dec_value = $(this).closest('.product_data').find('.qty-input').val();
    //     var prod_id = $(this).closest('.product_data').find('.prod_id').val();

    //     var value = parseInt(dec_value, 10);
    //     value = isNaN(value) ? 0 : value;
    //     if (value > 0) {
    //         value--;
    //         $(this).closest('.product_data').find('.qty-input').val(value);
    //     }
    //     if (value <= 0) {
    //         $.ajax({
    //             method: "post",
    //             url: "delete-cart-item",
    //             data: {
    //                 'prod_id': prod_id,
    //             },
    //             success: function (response) {
    //                 window.location.reload();
    //                 swal("", response.status, "success");
    //             }
    //         });
    //     }
    // });

    // $('.changeQuantity').click(function (e) {
    //     e.preventDefault();

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     var prod_id = $(this).closest('.product_data').find('.prod_id').val();
    //     var qty = $(this).closest('.product_data').find('.qty-input').val();

    //     $.ajax({
    //         method: "post",
    //         url: "update-cart",
    //         data: {
    //             'prod_id': prod_id,
    //             'prod_qty': qty,
    //         },
    //         success: function (response) {
    //             window.location.reload();
    //         }
    //     });
    // });
});
