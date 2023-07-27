$(document).ready(function(){
    $('#cart-btn').click(function(){

        $('#cart-btn').attr('disabled', true);

        let item_id = $(this).data('item-id');


        $.ajax({
            url: '/add-to-cart',
            type: 'GET',
            data: {
                item_id: item_id
            },
            success: function(data){
                let cart = document.getElementById('cart-message')
                cart.innerHTML = data.message;
                cart.classList.add('text-success');
            },
            error: function(data){
                let cart = document.getElementById('cart-message')
                cart.innerHTML = data.responseJSON.message;
                cart.classList.add('text-danger');
            }
        });
    });
});
