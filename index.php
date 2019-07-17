<?php
session_start();
if (!isset($_SESSION['autenticado'])) {
    $_SESSION['autenticado'] = false;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>TOMB RAIDER</title>
    <link rel="shortcut icon" type="image/x-icon" href="./trfavicon.ico">
    <meta charset="utf-8">
    <!-- Responsivo -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require_once __DIR__.'/headLinks.php';
    require_once __DIR__.'/headLinkClasses.php'; ?>

</head>
<body>
<?php require_once __DIR__.'/header.php';?>
<main>
    <div class="container">
        <?php

        //TODO: habilitar partes autenticadas
        //if(!$_SESSION['valid']) {
        //    require_once __DIR__.'/controllers/login.php';

        //            if (isset($_GET['acao'])) {
        //                $controller = $_GET['acao'];
        //            } else {
        //                $controller = 'principal';
        //            }
        //
        //            require_once __DIR__ . '/controllers/' . $controller . '.php';
        require_once __DIR__ . '/controllers/principal.php';


        ?>
    </div>
</main>
</body>
<?php require_once __DIR__.'/footer.php'?>
</html>