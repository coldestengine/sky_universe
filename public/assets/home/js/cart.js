$(document).ready(function () {
    $('.del-item').click(function () {
        var id = $(this).data('id');
        var url = '/cart-delete';
        console.log(id);
        $.ajax({
            url: url,
            data: { id: id },
            type: 'GET',
            success: function (response) {
                window.location.href = '/cart';
            }
        });
    });

    function formatNumberWithDots(number) {
        return number.toString().replace(/,/g, ".");
    }
    $('.form-check-input').change(function () {
        type = $(this).val();
        if(type === 'collect'){
            $('#delivery').addClass('d-none');
            $('#total').text($('#subtotal').text());
        } else {
            $('#delivery').removeClass('d-none');
            $('#total').text("IDR " + formatNumberWithDots(parseInt(($('#subtotal').data('price') + $('#delivery-price').data('price'))).toLocaleString()) );
            console.log();
        }
    });

});
