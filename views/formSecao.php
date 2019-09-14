<h2>Seção</h2>
<form id="formSecao" action=''> <!--method='post'/-->
    <div class="form-group">
        <label for="id">Id</label>
        <input type="number" class="form-control" id="id" name="id" value="<?= isset($_GET['id'])?$object->getId():''; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="ordem">Ordem</label>
        <input type="number" class="form-control" id="ordem" name="ordem" value="<?= isset($_GET['id'])?$object->getOrdem():''; ?>">
    </div>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?= isset($_GET['id'])?$object->getNome():''; ?>">
    </div>
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" rows="5" cols="100" id="descricao" name="descricao"><?=isset($_GET['id'])? $object->getDescricao():'';?></textarea>
        <!--textarea deve ficar na mesma linha para evitar espaços na frente do texto ao criar/editar-->
        <!--/* isset($_GET['id'])? addslashes(str_replace(PHP_EOL, '', $object->getDescricao())):'';*/-->
    </div>
    <div class="form-group">
        <!-- Variáveis POST para identificar a Classe e o método CRUD -->
        <input type="text" name="classe" value="secao" hidden>
        <input type="text" name="<?= isset($_GET['id'])?'submitEditar':'submitCriar';?>" hidden>

        <input type="submit" class="btn btn-outline-primary" value="Salvar">
        <button type='button' class='btn btn-outline-danger more-vert-margin' onclick='voltarMesmaSecao(`admin`)'>Voltar</button>
    </div>
</form>