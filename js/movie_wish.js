$(function() {
    $('body').on('click', '#addWish', function(e) {
        var movie_id = $(this).data('movieid');
        $.ajax({
            method: "POST",
            url: "./ajax/togglewishlist.php",
            dataType: 'json',
            data: { movie_id: movie_id }
        }).done(function(rtnData) {
            console.log(rtnData);
            $('#addWish').text('Remove from wish list').attr('id', 'removeWish');
        });
    });

    $('body').on('click', '#removeWish', function(e) {
        var movie_id = $(this).data('movieid');
        $.ajax({
            method: "POST",
            url: "./ajax/togglewishlist.php",
            dataType: 'json',
            data: { movie_id: movie_id }
        }).done(function( rtnData ) {
            console.log(rtnData);
            $('#removeWish').text('Add to wish list').attr('id', 'addWish');

        });
    });
});
