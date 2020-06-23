$(document).ready(function () {

    $('#login-form').submit(function (e) {
        const postData = {
            correo: $('#correo').val(),
            clave: $('#pass').val()
        };

        $.post('login/iniciarSesion', postData, function (response) {
            // console.log(response);
            if (response == "1") {
                $(location).attr('href','http://localhost/Accountfast/inicio');
            } else {
                let template = `<div class="alert alert-danger alert-dismissible fade show" role="alert">Correo Electrónico o Contraseña Incorrectos
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>`;
                $('#alerta').html(template);
            }
        });
        e.preventDefault();
    });

});