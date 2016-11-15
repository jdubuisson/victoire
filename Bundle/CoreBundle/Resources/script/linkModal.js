$(document).ready(function() {
    // To use it  : <a href="/url/to/a/victoire/page?layout=modal" data-toggle="viclink-modal">link</a>
    $(document).on('click', '[data-toggle="viclink-modal"]', function(e) {
        e.preventDefault();
        $('.modal').modal('hide').on('hidden.bs.modal', function(){$(this).remove()});

        var url = $(this).attr('href');
        $('#canvasloader-container').fadeIn();
        $.get(url, function(data) {
            $('body').append(data);
            $('#ajax-modal').modal('show');
        }).success(function() {
            $('#canvasloader-container').fadeOut();
            $('input:text:visible:first').focus();
        });
    });

    $('*[data-toggle="viclink-modal"]').each(function() {
        $(this).css({
            'pointer-events' : 'auto',
            'cursor' : 'auto'
        });
    });
});

$(document).ajaxComplete(function() {
    $('*[data-toggle="viclink-modal"]').each(function () {
        $(this).css({
            'pointer-events': 'auto',
            'cursor': 'auto'
        });
    });
});