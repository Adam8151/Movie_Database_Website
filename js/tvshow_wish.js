$(function() {
    $('body').on('click', '#addWish', function(e) {
        var tv_show_id = $(this).data('tvshowid');
        $.ajax({
            method: "POST",
            url: "./ajax/togglewishlist.php",
            dataType: 'json',
            data: { tv_show_id: tv_show_id }
        }).done(function(rtnData) {
            console.log(rtnData);
            $('#addWish').text('Remove from wish list').attr('id', 'removeWish');
        });
    });

    $('body').on('click', '#removeWish', function(e) {
        var tv_show_id = $(this).data('tvshowid');
        $.ajax({
            method: "POST",
            url: "./ajax/togglewishlist.php",
            dataType: 'json',
            data: { tv_show_id: tv_show_id }
        }).done(function( rtnData ) {
            console.log(rtnData);
            $('#removeWish').text('Add to wish list').attr('id', 'addWish');

        });
    });
});
