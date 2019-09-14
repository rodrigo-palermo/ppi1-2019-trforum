<h3>Escreva seu comentário</h3>
<form id="formPost" action=''> <!--method='post'/-->
    <div class="form-group">
<!--        <label for="id">Id</label>-->
        <input type="number" class="form-control" id="id" name="id" value="<?= isset($_GET['id'])?$object->getId():''; ?>" readonly hidden>
    </div>
    <div class="form-group">
<!--        <label for="id_topico">Tópico</label>-->
        <input type="number" class="form-control" id="id_topico" name="id_topico" value="<?= isset($_GET['id'])?$object->getIdTopico():$_SESSION['id_topico']; ?>" readonly hidden>
    </div>
    <div class="form-group">
<!--        <label for="id_usuario">Id Usuário</label>-->
        <input type="number" class="form-control" id="id_usuario" name="id_usuario" value="<?= isset($_GET['id'])?$object->getIdUsuario():$_SESSION['id_usuario']; ?>" readonly hidden>
    </div>
    <div class="form-group">
<!--        <label for="nome">Título</label>-->
        <input type="text" class="form-control" id="nome" name="nome" value="<?= isset($_GET['id'])?$object->getNome():' '; ?>" hidden>
    </div>
    <div class="form-group">
        <label for="descricao">Comentário</label>
        <textarea class="form-control" rows="5" cols="100" id="descricao" name="descricao"><?=print "\n\n\n--------------------------------------\n"; print (Usuario::findById($_SESSION['id_usuario']))->getAssinatura();?></textarea>
        <!--textarea deve ficar na mesma linha para evitar espaços na frente do texto ao criar/editar-->
        <!--/* isset($_GET['id'])? addslashes(str_replace(PHP_EOL, '', $object->getDescricao())):'';*/-->
    </div>
    <div class="form-group">
        <!-- Variáveis POST para identificar a Classe e o método CRUD -->
        <input type="text" name="classe" value="post" hidden>
        <input type="text" name="<?= isset($_GET['id'])?'submitEditar':'submitCriar';?>" hidden>

        <input type="submit" class="btn btn-outline-primary" value="Publicar">
        <button type='button' class='btn btn-outline-danger more-vert-margin' onclick='abreTopico(<?=$_SESSION['id_forum']?>,<?=$_SESSION['id_topico']?>)'>Voltar</button>
    </div>
</form>

<!--<script>-->
<!--    document.getElementById('data_hora_atual').valueAsDate = new Date();-->
<!--</script>-->