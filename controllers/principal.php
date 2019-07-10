<?php

print "<section id='home'>".PHP_EOL;

if (empty($_GET['acao'])) {

    require_once __DIR__ . '/../views/paginaPrincipal.php';

}
//elseif(isset($_GET['secaoOrdem'])) {

//        $secao = Secao::findByOrder($_GET['secaoOrdem']);
//
//        $secaoNome = ucfirst($secao->getNome());
//        $secaoDescricao = addslashes(str_replace(PHP_EOL,'', $secao->getDescricao()));
//
//        print "<h2>".$secaoNome."</h2>";
//        print $secaoDescricao;
//    require_once __DIR__ . '/../views/secao.php';

//}

else {
    require_once __DIR__.'/../notFound.php';
}

print "</section>";
?>

<script>
    function mudaSecao(thisNav, thisSec) {
        $('.active')[0].className = 'nav-link';
        thisNav.className = 'nav-link active';
        if(thisSec == 'principal' || thisSec == 'admin') {
            $('section').load('controllers/' + thisSec + '.php');
        }
        else{
            $('section').load('controllers/secao.php?secaoOrdem=' + thisSec);
        }
    };
    function acaoAdm(table, crud){
        $('section').load('controllers/database.php?table='+ table +'&crud=' + crud);
    };
    function voltarMesmaSecao(secao) {
        $('section').load('controllers/'+ secao +'.php');
    }
</script>

<?php
//DEBUG
//print var_dump($arrSecao);
?>
