<h2>Seção</h2>
    <form id="formSecao" action='' <!--method='post'-->>
        <div class="form-group">
            <label for="id">Id</label>
            <input type="number" id="id" name="id" value="<?= isset($_GET['id'])?$object->getId():''; ?>" readonly>
            <br/>
            <label for="ordem">Ordem</label>
            <input type="number" id="ordem" name="ordem" value="<?= isset($_GET['id'])?$object->getOrdem():''; ?>">
            <br/>
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="<?= isset($_GET['id'])?$object->getNome():''; ?>">
            <br/>
            <label for="descricao">Descrição</label>
            <textarea class="for-control" rows="5" cols="100" id="descricao" name="descricao">
                <?= isset($_GET['id'])? addslashes(str_replace(PHP_EOL, '', $object->getDescricao())):'';?>
            </textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="<?= isset($_GET['id'])?'submitEditar':'submitCriar';?>" value="Salvar">
        </div>
    </form>

<script>

    $(document).ready(function () {
        // conforme: https://blog.teamtreehouse.com/create-ajax-contact-form
        // https://code.tutsplus.com/tutorials/submit-a-form-without-page-refresh-using-jquery--net-59
        // Get the form
        var loc = window.location.pathname;
        var dir = loc.substring(0, loc.lastIndexOf('/'));
        var form = $('#formSecao');

        form.submit(function ( event ) {

            // Get the form data
            var formData = $(form).serialize();

            if( $('input#nome').val().length === 0 ) {
                alert("Informe o nome");
                event.preventDefault();
            } else {
                // Submit the form using AJAX
                $.ajax({
                    type: 'POST',
                    url: dir + '/controllers/admin.php',
                    data: formData,
                    success: function() {
                        $('#formSecao').hide(); //só esconde o formulario, mas h2 permanece

                        alert("Dados enviados com sucesso");
                        //location.reload();
                    },
                    error: function() {
                        alert("Erro ao enviar dados");
                    }
                });
                event.preventDefault();
            }
        });

        //reload page
        $('#btnCancel').click(function() {
            location.reload();
        });

    });
</script>