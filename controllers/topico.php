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
            <img src="../img/admin.png" alt="Topico" class="mr-3 mt-3 rounded-circle" style="width:60px;">
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
                <div class="media-body">
                    <img src="img/admin.png" alt="Post" class="mr-3 mt-3 rounded-circle" style="width:60px;">

                    <a class="nav-link" href="#" /*onclick="abrePost('< ?=$objeto->getIdTopico()?>','< ?=$objeto->getId()?>'*/)"><h4><?php print $objeto->getNome();?>
                        </h4></a>
                    <p><?=nl2br($objeto->getDescricao())?></p>
                </div>
            </div>
            <?php
        }

        if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {
            print "<button type='button' class='btn btn-outline-primary' onclick='acaoPublicar(`post`, `criar`)'>+</button><br><br>";
        }
    }
    else {
        print "<h5>Este tópico ainda não possui nenhum post</h5>";
        if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == false) {
            print "<p>Faça login ou abra uma conta gratuita para entrar na discussão</p>";
        }
    }
}
else {
    require_once __DIR__.'/../notFound.php';
}

print "<button type='button' class='btn btn-outline-danger more-vert-margin' onclick='abreForum(".$_SESSION['id_secao'].",".$_SESSION['id_forum'].")'>Voltar</button>";
