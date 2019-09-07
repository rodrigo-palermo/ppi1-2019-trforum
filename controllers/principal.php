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

    function abreLogin(thisNav, thisSec) {
        $('.active')[0].className = 'nav-link';
        $('#auxLogin')[0].className = 'nav-link active';
        $('section').load('controllers/' + thisSec + '.php');

    };

    function logout() {
        // $('#nav-btn-logout').hide();

        $(document).ready(function () {

            $('section').load('controllers/logout.php');
            alert("Sessão encerrada");
            location.reload();

        });
    };

    function atualizaPrincipal() {
        //location.assign("index.php");
        location.reload();

    };

    function voltarMesmaSecao(secao) {
        $('section').load('controllers/'+ secao +'.php');
    };

    function abreSecao(secaoOrdem) {
        $('section').load('controllers/secao.php?secaoOrdem=' + secaoOrdem);
    };

    function abreForum(id_secao, id_forum) {
        $('section').load('controllers/forum.php?id_secao=' + id_secao + '&id_forum=' + id_forum);
    };

    function abreTopico(id_forum, id_topico) {
        $('section').load('controllers/topico.php?id_forum=' + id_forum + '&id_topico=' + id_topico);
    };

    function abrePost(id_topico, id_post) {
        $('section').load('controllers/post.php?id_topico=' + id_topico + '&id_post=' + id_post);
    };

    function acaoPublicar(table, crud){
        $('section').load('controllers/admin_create_update.php?table='+ table +'&crud=' + crud);
    };

    function abreUsuarioRegistrar(){
        $('section').load('controllers/login.php?acao=registrar');
    };




</script>

<?php
////DEBUG
//print '<hr><br><p>DEBUG</p>';
//if (isset($_SESSION['autenticado'])) {
//    print '<pre>'.var_export($_SESSION, true).'</pre>';
//}


