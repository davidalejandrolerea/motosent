jQuery(document).on('submit', '#formLg', function(event) {

    event.preventDefault();
    jQuery.ajax({
        url: 'validacion_login/val_login.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),

    })

    .done(function(respuesta) {
        console.log(respuesta);
        console.log(respuesta.tipo_usuario);
        if (!respuesta.error) {

            if (respuesta.tipo_usuario == '1') {
                location.href = 'vista/empresa/inicio_empresa.php';
            } else if (respuesta.tipo_usuario == '2') {
                location.href = 'vista/cliente/index.php';
            }

        } else {

            $('.errorr').slideDown('slow');
            setTimeout(function() {
                $('.errorr').slideUp('slow');
            }, 3000);

        }
    })

    .fail(function(resp) {
        console.log(resp.responseText);
    })

    .always(function() {
        console.log("complete");
    });
});

jQuery(document).on('submit', '#formLg', function(event) {


});