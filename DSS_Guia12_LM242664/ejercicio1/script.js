$(document).ready(function () {
    $('.tab').click(function () {
        var file = $(this).data('file');

        $.ajax({
            url: 'fichas/' + file + '.php',
            method: 'GET',
            success: function (data) {
                $('#contenido').html(data);
            },
            error: function () {
                $('#contenido').html('<p>Error al cargar el contenido.</p>');
            }
        });
    });
});
