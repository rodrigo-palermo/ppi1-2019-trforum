<?php
session_start();
require_once __DIR__ . '/../headLinkClasses.php';

if(isset($_GET['id_secao']) && isset($_GET['id_forum'])) {

    $forum = Forum::findById($_GET['id_forum']);

    $_SESSION['id_forum'] = $forum->getId();

    $forumNome = ucfirst($forum->getNome());
    $forumDescricao = addslashes(str_replace(PHP_EOL, '', $forum->getDescricao()));

    print "<h2>" . $forumNome . "</h2>";
    print "<p>" . $forumDescricao . "</p>";

    print "<h4>Tópicos</h4>";

    if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {
        print "<button type='button' class='btn btn-outline-primary' onclick='acaoPublicar(`topico`, `criar`)'>+</button><br><br>";
    }

    $arrObjeto = Topico::findAllByIdForum($forum->getId());

    if (!empty($arrObjeto)) {
        foreach ($arrObjeto as $objeto) {

            ?>
            <div class="media border p-3">
                <div class="media-body">
                    <img src="img/<?= Usuario::findById($objeto->getIdUsuario())->getImagem()?>" alt="Avatar do Usuario que criou o Topico." class="mr-3 mt-3 rounded-circle" style="width:60px;">
                    <p class="p-sub"><?= Usuario::findById($objeto->getIdUsuario())->getNome()?> abriu este tópico em <?= $objeto->getDataHora()?>
                    <br>Membro desde: <?= Usuario::findById($objeto->getIdUsuario())->getDataInscricao()?></p>
                    <a class="nav-link" href="#" onclick="abreTopico('<?=$objeto->getIdForum()?>','<?=$objeto->getId()?>')"><h4><?php print $objeto->getNome();?>
                        </h4></a>
                    <p><?php print $objeto->getDescricao();?></p>
                </div>
            </div>
            <?php
        }
    }
    else {
        print "<h5>Este fórum ainda não possui nenhum tópico</h5>";
        if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == false) {
            print "<p>Faça login ou abra uma conta gratuita para criar um</p>";
        }
    }
}
else {
    require_once __DIR__.'/../notFound.php';
}

print "<button type='button' class='btn btn-outline-danger more-vert-margin' onclick='abreSecao(".$_SESSION['secaoOrdem'].")'>Voltar</button>";