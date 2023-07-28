$(document).ready(function(){
    $('#select-location').change(function(){
        let loc = $(this).val();

        // set loading before fetching data
        $('#fh5co-gallery-list').html(`<div class="spinner-grow" role="status">
        <span class="visually-hidden" style="text-align: center;">Loading...</span>
      </div>`);


        $.ajax({
            url: '/get-catalogue',
            type: 'GET',
            data: {location: loc},
            success: function(data){
                $('#fh5co-gallery-list').html(data);
                console.log(data);

            },
            error: function(data){
                console.log(data);
            }
        });
    });
});
