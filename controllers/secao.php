<?php
require_once __DIR__ . '/../headLinkClasses.php';

if(isset($_GET['secaoOrdem'])) {

    $secao = Secao::findByOrder($_GET['secaoOrdem']);

    $secaoNome = ucfirst($secao->getNome());
    $secaoDescricao = addslashes(str_replace(PHP_EOL, '', $secao->getDescricao()));

    print "<h2>" . $secaoNome . "</h2>";
    print $secaoDescricao;
}
else {
    require_once __DIR__.'/../notFound.php';
}