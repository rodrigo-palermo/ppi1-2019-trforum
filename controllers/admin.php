<?php
require_once __DIR__ . '/../headLinkClasses.php';

$arrSecao = Secao::findAll();

//alterar local para database.php e no form criar botao para mudar sesao (talvez por ajax)
if (isset($_POST['submitEditar'])){
    $secao = new Secao();
    $secao->setId($_POST['id']);
    $secao->setOrdem($_POST['ordem']);
    $secao->setNome($_POST['nome']);
    $secao->setDescricao($_POST['descricao']);
    $secao->update();

}

require_once __DIR__ . '/../views/paginaAdminDB.php';
?>

