<?php
require_once __DIR__ . '/../headLinkClasses.php';

if (isset($_GET['acao'])) {

    switch ($_GET['acao']) {

        case 'registrar':
            require_once __DIR__ . '/../views/formUsuarioRegistrar.php';
            break;
    }
}
else {
    require_once __DIR__ . '/../views/formLogin.php';
}
?>
<script>
    $(document).ready(function () {

        var loc = window.location.pathname;
        var dir = loc.substring(0, loc.lastIndexOf('/'));
        var formLogin = $('#formLogin');
        var formUsuarioRegistrar = $('#formUsuarioRegistrar');

        formLogin.submit(function ( event ) {

            var formData = $(formLogin).serialize();

            $.ajax({
                type: 'POST',
                url: dir + '/controllers/login_auth.php',
                data: formData,
                success: function() {

                    alert("Login realizado com sucesso");
                    //$('#nav-btn-login').hide();
                    //$('#nav-btn-logout').show();
                    //voltarMesmaSecao(`principal`);
                    atualizaPrincipal();

                },
                error: function() {
                    alert("Usuário e/ou senha incorretos");
                }
            });
            event.preventDefault();

        });

        formUsuarioRegistrar.submit(function ( event ) {

            var formData = $(formUsuarioRegistrar).serialize();

            if( $('input#nome').val().length === 0 ) {
                alert("Informe o nome");
                event.preventDefault();
            } else {
                $.ajax({
                    type: 'POST',
                    url: dir + '/controllers/admin.php',
                    data: formData,
                    success: function() {

                        alert("Nova conta registrada com sucesso");
                        voltarMesmaSecao(`principal`);
                    },
                    error: function() {
                        alert("Erro ao registrar nova conta");
                    }
                });
                event.preventDefault();
            }
        });
    });
</script>
