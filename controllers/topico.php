<?php
session_start();
require_once __DIR__ . '/../headLinkClasses.php';

if(isset($_GET['id_forum']) && isset($_GET['id_topico'])) {

    $topico = Topico::findById($_GET['id_topico']);

    $_SESSION['id_topico'] = $topico->getId();

    $topicoNome = ucfirst($topico->getNome());
    $topicoDescricao = addslashes(str_replace(PHP_EOL, '', $topico->getDescricao()));

    //print "<h2>" . $topicoNome . "</h2>";
    //print "<p>" . $topicoDescricao . "</p>";

    ?>
    <div class="media border p-3">
        <div class="media-body">
            <img src="img/<?= Usuario::findById($topico->getIdUsuario())->getImagem()?>" alt="Avatar do Usuario que criou o Topico." class="mr-3 mt-3 rounded-circle" style="width:60px;">
            <p class="p-sub"><?= Usuario::findById($topico->getIdUsuario())->getNome()?> abriu este tópico em <?= $topico->getDataHora()?>
                <br>Membro desde: <?= Usuario::findById($topico->getIdUsuario())->getDataInscricao()?></p>
            <a class="nav-link" href="#" onclick="abreTopico('<?=$topico->getIdForum()?>','<?=$topico->getId()?>')"><h4><?php print $topico->getNome();?>
                </h4></a>
            <p><?php print $topico->getDescricao();?></p>
        </div>
    </div>
    <?php

    print "<h4>Posts</h4>";

    $arrObjeto = Post::findAllByIdTopico($topico->getId());

    if (!empty($arrObjeto)) {
        foreach ($arrObjeto as $objeto) {

            ?>
            <div class="media border p-3">

                <img src="img/<?= Usuario::findById($objeto->getIdUsuario())->getImagem()?>" alt="Avatar do Usuario que criou o Post." class="mr-3 mt-3 rounded-circle" style="width:60px;">

                <div class="media-body">
                    <sub>Membro desde: <?= Usuario::findById($objeto->getIdUsuario())->getDataInscricao()?></sub>
                    <a class="nav-link" href="#" /*onclick="abrePost('< ?=$objeto->getIdTopico()?>','< ?=$objeto->getId()?>'*/)">
                    <h5><?=Usuario::findById($objeto->getIdUsuario())->getNome();?><small><i> comentou em <?= $objeto->getDataHora()?> </i></small>
                    </h5></a>
                    <p class="p-sub">

                    <p><?=nl2br($objeto->getDescricao())?></p>
                </div>
            </div>
            <?php
        }
    }
    else {
        print "<h5>Este tópico ainda não possui nenhum post</h5>";
        if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == false) {
            print "<p>Faça login ou abra uma conta gratuita para entrar na discussão</p>";
        }
    }

    if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {
        print "<button type='button' class='btn btn-outline-primary' onclick='acaoPublicar(`post`, `criar`)'>+</button><br><br>";
    }
}
else {
    require_once __DIR__.'/../notFound.php';
}

print "<button type='button' class='btn btn-outline-danger more-vert-margin' onclick='abreForum(".$_SESSION['id_secao'].",".$_SESSION['id_forum'].")'>Voltar</button>";
