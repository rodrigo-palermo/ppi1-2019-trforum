<?php

require_once __DIR__ . '/../headLinkClasses.php';

// Controle genérico para rotear métodos CREATE/UPDATE das classes para respectivos formulários
if (!empty($_GET['table']) && !empty($_GET['crud'])) {

    $table = $_GET['table'];
    $crud = $_GET['crud'];
    if (!empty($_GET['id'])) {
        $object = ($table)::findById($_GET['id']);
    }
    switch ($crud) {
        case 'criar':
        case 'editar':

            require_once __DIR__ . '/../views/form' . ucfirst($table) . '.php';
            break;
    }
}
?>
<script>
$(document).ready(function () {
    // Baseado em: https://blog.teamtreehouse.com/create-ajax-contact-form
    //             https://code.tutsplus.com/tutorials/submit-a-form-without-page-refresh-using-jquery--net-59
    // Variáveis para funções do formulário
    var loc = window.location.pathname;
    var dir = loc.substring(0, loc.lastIndexOf('/'));
    var form = $('form');  // utiliza o formulário aberto, podendo ser formSecao, formForum, etc

    form.submit(function ( event ) {

        // Armazena dados do formulário
        var formData = $(form).serialize();

        if( $('input#nome').val().length === 0 ) {
            alert("Informe o nome");
            event.preventDefault();
        } else {
            // Envia o formulário via Ajax
            $.ajax({
                    type: 'POST',
                    url: dir + '/controllers/admin.php',
                    data: formData,
                    success: function() {
                //$('#formSecao').hide(); //Esconde o formulário, mas título permanece

                alert("Dados gravados com sucesso");
                //location.reload();  //volta para index.php - paginaPrincipal
                voltarMesmaSecao(`admin`);
            },
                    error: function() {
                alert("Erro ao enviar dados");
            }
                });
                event.preventDefault();
            }
    });

    // Recarrega a página
    $('#btnCancel').click(function() {
        location.reload();
    });
});
</script>