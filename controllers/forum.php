<?php
require_once __DIR__ . '/../headLinkClasses.php';

if(isset($_GET['id_secao']) && isset($_GET['id_forum'])) {

    $forum = Forum::findById($_GET['id_forum']);

    $forumNome = ucfirst($forum->getNome());
    $forumDescricao = addslashes(str_replace(PHP_EOL, '', $forum->getDescricao()));

    print "<h2>" . $forumNome . "</h2>";
    print $forumDescricao;

    print "<h4>Tópicos</h4>";

}
else {
    require_once __DIR__.'/../notFound.php';
}