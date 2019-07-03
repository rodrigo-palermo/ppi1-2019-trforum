<?php

$conn = Database::getBanco();
try {
    $sql = "SELECT nome, descricao FROM secao";
    $stmt = $conn->query($sql);

} catch (PDOException $e) {
    print "Erro: ".$e->getMessage();
}
$secao_nome = $stmt[0]['nome'];
$secao_descricao = $stmt[0]['descricao'];
?>


    <section id=<?php print $secao_nome;?> class="active">
        <?php print $secao_descricao;/*require_once 'views/tempPrincipal.php';*/?>
    </section>




<script>
    function mudaSecao(thisNav, thisSec) {
        $('.active')[0].className = 'nav-link';
        thisNav.className = 'nav-link active';
        //$('.active')[0].className = '';
        //document.getElementById(thisSec).className = 'active';
        $('section').load("views/" + thisSec + ".php");
    }
</script>
