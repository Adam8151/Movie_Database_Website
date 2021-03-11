$(function() {
    $('body').on('click', '#addWatched', function(e) {
        var movie_id = $(this).data('movieid');
        $.ajax({
            method: "POST",
            url: "./ajax/togglewatchedlist.php",
            dataType: 'json',
            data: { movie_id: movie_id }
        }).done(function(rtnData) {
            console.log(rtnData);
            $('#addWatched').text('Remove from watched list').attr('id', 'removeWatched');
        });
    });

    $('body').on('click', '#removeWatched', function(e) {
        var movie_id = $(this).data('movieid');
        $.ajax({
            method: "POST",
            url: "./ajax/togglewatchedlist.php",
            dataType: 'json',
            data: { movie_id: movie_id }
        }).done(function( rtnData ) {
            console.log(rtnData);
            $('#removeWatched').text('Add to watched list').attr('id', 'addWatched');

        });
    });
});
