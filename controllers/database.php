<?php
require_once __DIR__ . '/../headLinkClasses.php';

if (!empty($_GET['table']) && !empty($_GET['crud'])) {

    $table = $_GET['table'];
    $crud = $_GET['crud'];
    if (!empty($_GET['id'])) {
        $object = ($table)::findById($_GET['id']);
    }
    switch ($crud) {
        case 'criar':
        case 'editar':

            require_once __DIR__ . '/../views/form' . ucfirst($table) . '.php';
            break;

        case 'excluir':
            require_once __DIR__ . '/../views/form' . ucfirst($table) . '.php';
            break;
    }

}// else {
//    require_once __DIR__ . '/principal.php';
//}
//print "<button type=\"button\" class=\"btn btn-danger\" onclick='location.href=`index.php`'>Voltar</button>";
print "<button type='button' class='btn btn-danger' onclick='voltarMesmaSecao(`admin`)'>Voltar</button>";