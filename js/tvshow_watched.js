$(function() {
    $('body').on('click', '#addWatched', function(e) {
        var tv_show_id = $(this).data('tvshowid');
        $.ajax({
            method: "POST",
            url: "./ajax/togglewatchedlist.php",
            dataType: 'json',
            data: { tv_show_id: tv_show_id }
        }).done(function(rtnData) {
            console.log(rtnData);
            $('#addWatched').text('Remove from watched list').attr('id', 'removeWatched');
        });
    });

    $('body').on('click', '#removeWatched', function(e) {
        var tv_show_id = $(this).data('tvshowid');
        $.ajax({
            method: "POST",
            url: "./ajax/togglewatchedlist.php",
            dataType: 'json',
            data: { tv_show_id: tv_show_id }
        }).done(function( rtnData ) {
            console.log(rtnData);
            $('#removeWatched').text('Add to watched list').attr('id', 'addWatched');

        });
    });
});
