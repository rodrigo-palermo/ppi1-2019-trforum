<h2>Crie sua nova conta</h2>
<form id="formUsuarioRegistrar" action=''> <!--method='post'/-->
    <div class="form-group">
<!--        <label for="id"></label>-->
        <input type="number" class="form-control" id="id" name="id" value="" readonly hidden>
    </div>
    <div class="form-group">
<!--        <label for="id_perfil"></label>-->
        <input type="number" class="form-control" id="id_perfil" name="id_perfil" value="2" readonly hidden> <!-- 2-padrao -->
    </div>
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" class="form-control" id="login" name="login" value="" required>
    </div>
    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="text" class="form-control" id="senha" name="senha" value="" required>
    </div>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="" required>
    </div>
    <div class="form-group">
<!--        <label for="data_inscricao"></label>-->
        <input id="data_atual" type="date" class="form-control" id="data_inscricao" name="data_inscricao"> <!--hidden-->
    </div>
    <div class="form-group">
        <label for="imagem">Foto do perfil</label>
        <input type="text" class="form-control" id="imagem" name="imagem" value="" placeholder="Informe a extensão (.png, .jpg)">
    </div>
    <div class="form-group">
        <label for="assinatura">Assinatura</label>
        <input type="text" class="form-control" id="assinatura" name="assinatura" value="<?= isset($_GET['id'])?$object->getAssinatura():''; ?>" placeholder="Informe o texto a ser exibido no final de cada post" required>
    </div>

    <div class="form-group">
        <!-- Variáveis POST para identificar a Classe e o método CRUD -->
        <input type="text" name="classe" value="usuario" hidden>
        <input type="text" name="submitCriar" hidden>

        <input type="submit" class="btn btn-outline-primary" value="Salvar">
        <button type='button' class='btn btn-outline-danger more-vert-margin' onclick='voltarMesmaSecao(`login`)'>Cancelar</button>
    </div>
</form>

<script>
    document.getElementById('data_atual').valueAsDate = new Date();
</script>