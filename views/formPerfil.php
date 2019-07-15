<h2>Perfil</h2>
<form id="formPerfil" action=''> <!--method='post'/-->
    <div class="form-group">
        <label for="id">Id</label>
        <input type="number" class="form-control" id="id" name="id" value="<?= isset($_GET['id'])?$object->getId():''; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?= isset($_GET['id'])?$object->getNome():''; ?>">
    </div>
    <div class="form-group">
        <!-- Variáveis GET para identificar no a Classe e o método CRUD -->
        <input type="text" name="classe" value="perfil" hidden>
        <input type="text" name="<?= isset($_GET['id'])?'submitEditar':'submitCriar';?>" hidden>

        <input type="submit" class="btn btn-outline-primary" value="Salvar">
        <button type='button' class='btn btn-outline-danger more-vert-margin' onclick='voltarMesmaSecao(`admin`)'>Voltar</button>
    </div>
</form>