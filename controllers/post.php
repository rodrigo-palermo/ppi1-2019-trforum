<?php
session_start();
require_once __DIR__ . '/../headLinkClasses.php';

if(isset($_GET['id_topico']) && isset($_GET['id_post'])) {

    $post = Post::findById($_GET['id_post']);

    $_SESSION['id_post'] = $post->getId();

    $postNome = ucfirst($post->getNome());
    $postDescricao = addslashes(str_replace(PHP_EOL, '', $post->getDescricao()));

    //print "<h2>" . $postNome . "</h2>";
    //print "<p>" . $postDescricao . "</p>";

    ?>
    <div class="media border p-3">
        <div class="media-body">
            <a class="nav-link" href="#" onclick="abreTopico('<?=$post->getIdForum()?>','<?=$post->getId()?>')"><h4><?php print $post->getNome();?>
                </h4></a>
            <p><?php print $post->getDescricao();?></p>
        </div>
    </div>
    <?php

    print "<h4>Posts</h4>";

    if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {
        print "<button type='button' class='btn btn-outline-primary' onclick='acaoPublicar(`post`, `criar`)'>+</button><br><br>";
    }

        $arrObjeto = Post::findAllByIdPost($post->getId());

    if (!empty($arrObjeto)) {
        foreach ($arrObjeto as $objeto) {

            ?>
            <div class="media border p-3">
                <div class="media-body">
                    <a class="nav-link" href="#" onclick="abrePost('<?=$objeto->getIdPost()?>','<?=$objeto->getId()?>')"><h4><?php print $objeto->getNome();?>
                        </h4></a>
                    <p><?php print $objeto->getDescricao();?></p>
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
}
else {
    require_once __DIR__.'/../notFound.php';
}

print "<button type='button' class='btn btn-outline-danger more-vert-margin' onclick='abreForum(".$_SESSION['id_secao'].",".$_SESSION['id_forum'].")'>Voltar</button>";
