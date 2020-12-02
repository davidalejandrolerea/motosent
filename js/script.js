$(document).ready(function() {

    $('#btnSend').click(function() {

        var errores = '';

        // Validado Nombre ==============================
        if ($('#usuario').val() == '') {
            errores += '<p>x usuario</p>';

        }


        // Validado apellido ==============================
        if ($('#contraseña').val() == '') {
            errores += '<p>x contraseña </p>';
        }

        // ENVIANDO MENSAJE ============================
        if (errores == '' == false) {
            var mensajeModal = '<div class="modal_wrap">' +
                '<div class="mensaje_modal">' +
                '<h3>ingrese los datos:</h3>' +
                errores +
                '<span id="btnClose">Cerrar</span>' +
                '</div>' +
                '</div>'

            $('body').append(mensajeModal);
        }

        // CERRANDO MODAL ==============================
        $('#btnClose').click(function() {
            $('.modal_wrap').remove();
        });
    });
});