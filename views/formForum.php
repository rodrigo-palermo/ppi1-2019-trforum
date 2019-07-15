<h2>Fórum</h2>
<form id="formForum" action=''> <!--method='post'/-->
    <div class="form-group">
        <label for="id">Id</label>
        <input type="number" class="form-control" id="id" name="id" value="<?= isset($_GET['id'])?$object->getId():''; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="id_secao">Seção</label>
        <select class="form-control" id="id_secao" name="id_secao">
            <?php if (isset($_GET['id'])) {
                $arrSecao = Secao::findAll();
                foreach ($arrSecao as $secao) {
                    $op = "<option value='".$secao->getId()."'";
                    $op .= ($object->getIdSecao() == $secao->getId())?" selected='selected'":"";
                    $op .= ">";
                    $op .= $secao->getNome();
                    $op .= "</option>".PHP_EOL;
                    print $op;
                }
            }
            else {
                $arrSecao = Secao::findAll();
                foreach ($arrSecao as $secao) {
                    $op = "<option value='".$secao->getId()."'>";
                    $op .= $secao->getNome();
                    $op .= "</option>".PHP_EOL;
                    print $op;
                }
            } ?>
        </select>
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
        <label for="imagem">Imagem</label>
        <input type="text" class="form-control" id="imagem" name="imagem" value="<?= isset($_GET['id'])?$object->getImagem():''; ?>">
    </div>
    <div class="form-group">
        <!-- Variáveis GET para identificar no a Classe e o método CRUD -->
        <input type="text" name="classe" value="forum" hidden>
        <input type="text" name="<?= isset($_GET['id'])?'submitEditar':'submitCriar';?>" hidden>

        <input type="submit" class="btn btn-outline-primary" value="Salvar">
        <button type='button' class='btn btn-outline-danger' onclick='voltarMesmaSecao(`admin`)'>Voltar</button>
    </div>
</form>