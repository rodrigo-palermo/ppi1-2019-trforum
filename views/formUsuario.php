<h2>Usuário</h2>
<form id="formUsuario" action=''> <!--method='post'/-->
    <div class="form-group">
        <label for="id">Id</label>
        <input type="number" class="form-control" id="id" name="id" value="<?= isset($_GET['id'])?$object->getId():''; ?>" readonly hidden>
    </div>
    <div class="form-group">
        <label for="id_perfil">Seção</label>
        <select class="form-control" id="id_perfil" name="id_perfil">
            <?php if (isset($_GET['id'])) {
                $arrPerfil = Perfil::findAll();
                foreach ($arrPerfil as $perfil) {
                    $op = "<option value='".$perfil->getId()."'";
                    $op .= ($object->getIdPerfil() == $perfil->getId())?" selected='selected'":"";
                    $op .= ">";
                    $op .= $perfil->getNome();
                    $op .= "</option>".PHP_EOL;
                    print $op;
                }
            }
            else {
                $arrPerfil = Perfil::findAll();
                foreach ($arrPerfil as $perfil) {
                    $op = "<option value='".$perfil->getId()."'>";
                    $op .= $perfil->getNome();
                    $op .= "</option>".PHP_EOL;
                    print $op;
                }
            } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" class="form-control" id="login" name="login" value="<?= isset($_GET['id'])?$object->getLogin():''; ?>">
    </div>
    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="text" class="form-control" id="senha" name="senha" value="<?= isset($_GET['id'])?$object->getSenha():''; ?>">
    </div>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?= isset($_GET['id'])?$object->getNome():''; ?>">
    </div>
<!--    <div class="form-group">-->
<!--        <label for="data_inscricao">Data de inscrição</label>-->
<!--        <input type="date" class="form-control" id="data_inscricao" name="data_inscricao" value="--><?//= isset($_GET['id'])?$object->getDataInscricao():''; ?><!--">-->
<!--    </div>-->
    <div class="form-group">
        <label for="imagem">Imagem</label>
        <input type="text" class="form-control" id="imagem" name="imagem" value="<?= isset($_GET['id'])?$object->getImagem():''; ?>">
    </div>
    <div class="form-group">
        <label for="assinatura">Assinatura</label>
        <input type="text" class="form-control" id="assinatura" name="assinatura" value="<?= isset($_GET['id'])?$object->getAssinatura():''; ?>">
    </div>

    <div class="form-group">
        <!-- Variáveis POST para identificar a Classe e o método CRUD -->
        <input type="text" name="classe" value="usuario" hidden>
        <input type="text" name="<?= isset($_GET['id'])?'submitEditar':'submitCriar';?>" hidden>

        <input type="submit" class="btn btn-outline-primary" value="Salvar">
        <button type='button' class='btn btn-outline-danger more-vert-margin' onclick='voltarMesmaSecao(`admin`)'>Voltar</button>
    </div>
</form>