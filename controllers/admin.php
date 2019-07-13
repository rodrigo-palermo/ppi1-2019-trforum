<?php
require_once __DIR__ . '/../headLinkClasses.php';

$arrSecao = Secao::findAll();
$arrForum = Forum::findAll();

// TODO: alterar local para database.php ????????
if (isset($_POST['submitCriar']) || isset($_POST['submitEditar'])) {
    $secao = new Secao();

    $secao->setOrdem($_POST['ordem']);
    $secao->setNome($_POST['nome']);
    $secao->setDescricao($_POST['descricao']);
    if (isset($_POST['submitEditar'])) {
        $secao->setId($_POST['id']);
        $secao->update();
    }
    else {
        $secao->insert();
    }

}

require_once __DIR__ . '/../views/paginaAdminDB.php';
?>

