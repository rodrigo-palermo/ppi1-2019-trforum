<?php
session_start();
require_once __DIR__ . '/../headLinkClasses.php';

if (isset($_POST['submitEntrar'])) {

    $login = $_POST['login'];
    $senha_digitada = $_POST['senha'];

    $usuario = Usuario::findByLogin($login);

    if(empty($usuario)) {
        http_response_code(500);
    }
    else {
        if ($senha_digitada == $usuario->getSenha()) {
            $_SESSION['autenticado'] = true;
            $_SESSION['id_usuario'] = $usuario->getId();
            $_SESSION['perfil'] =  $usuario->getIdPerfil();
            http_response_code(200);
        }
        else {
            http_response_code(500);
        }
    }
}