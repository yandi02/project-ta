$(function () {
    /*=======================
                UI Slider Range JS
    =========================*/

    $(document).ready(function () {
        //default
        $(".range-idr").slider({
            range: true,
            min: 8000,
            max: 120000,
            values: [$("#min_price").val(), $("#max_price").val()],
            slide: function (event, ui) {
                $("#amount").val(ui.values[0] + " - " + ui.values[1]);
            }
        });
        $("#amount").val($(".range-idr").slider("values", 0) +
            " - " + $(".range-idr").slider("values", 1));

        // $('.courier-code').removeAttr('checked');
        
        $('.delivery-address').change(function () {
            $('.courier-code').removeAttr('checked');
            $('.available-service').hide();
        });

        $('.courier-code').click(function () { 
            let courier = $(this).val();
            let addressID = $('.delivery-address:checked').val();

            $.ajax({
                url: "/orders/shipping_fee",
                method: "POST",
                data: {
                    address_id: addressID,
                    courier: courier,
                    _token: $('[name=csrf-token]').attr('content'),
                },
                success: function (result) { 
                    $('.available-service').show();
                    $('.available-service').html(result);
                },
                error: function (e) { 
                    console.log(e);
                }
            });
        });

        //button idr clicked
        // $('#idr').on('click', function () {  
        //     $(".range-idr").slider({
        //         range: true,
        //         min: 10000,
        //         max: 1500000,
        //         values: [10000, 500000],
        //         slide: function (event, ui) {
        //             $("#amount").val("Rp. " + ui.values[0].toLocaleString('id-ID', { minimumFractionDigits: 2 }) + ' - Rp. ' + ui.values[1].toLocaleString('id-ID', { minimumFractionDigits: 2 }));
        //         }
        //     });
    
        //     $("#amount").val("Rp. " + $(".range-idr").slider("values", 0).toLocaleString('id-ID', { minimumFractionDigits: 2 }) + ' - Rp. ' + $(".range-idr").slider("values", 1).toLocaleString('id-ID', { minimumFractionDigits: 2 }));
            
        //     $(".range-idr").show();
        //     // $(".range-usd").hide();
        // });
        
        //button usd clicked
        // $('#usd').on('click', function () {  
            // $(".range-usd").slider({
            //     range: true,
            //     min: 10,
            //     max: 5000,
            //     values: [10, 2500],
            //     slide: function (event, ui) {
            //         $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            //     }
            // });
            // $("#amount").val("$" + $(".range-usd").slider("values", 0) +
            //     " - $" + $(".range-usd").slider("values", 1));

        //     $(".range-idr").hide();
        //     $(".range-usd").show();
        // });
    });
});
