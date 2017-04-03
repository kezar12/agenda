$(document).ready(function () {
    $('#btn_usuarios').click(function () {
        $.ajax({
            url: "agregar.phtml"
        }).done(function (html) {
            $('#contenido').html(html);
        }).fail(function () {
            alert('Error al cargar modulo');
        });
    });
});