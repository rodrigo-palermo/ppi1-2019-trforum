<?php

//DEBUG
//print "<a href='index.php?acao=teste'>Teste Geral</a>";


$arrSecao = Secao::findAll();

$secao_principal_nome = $arrSecao[0]->getNome();
$secao_principal_descricao = addslashes(str_replace(PHP_EOL,' ', $arrSecao[0]->getDescricao()));
$secao_jogos_nome = $arrSecao[1]->getNome();
$secao_jogos_descricao = addslashes(str_replace(PHP_EOL,'', $arrSecao[1]->getDescricao()));
$secao_filmes_nome = $arrSecao[2]->getNome();
$secao_filmes_descricao = str_replace(PHP_EOL,'', $arrSecao[2]->getDescricao());



?>
    <section id='<?php print $secao_principal_nome;?>'>
        <?php require_once __DIR__ . '/../views/secaoPrincipal.php' ?>
    </section>

    <script>
        function mudaSecao(thisNav, thisSec) {
            $('.active')[0].className = 'nav-link';
            thisNav.className = 'nav-link active';
            if(thisSec == 'principal') {
                $('section').load('views/secaoPrincipal.php');  //TODO: ou para cada secao uma view ou controller e lá insere texto e de descricao e criar posts
            }
            if(thisSec == 'jogos') {
                $('section').html("<?php print $secao_jogos_descricao;?>");
            }
            if(thisSec == 'filmes') {
                $('section').html("<?php print $secao_filmes_descricao;?>");
            }

        }
    </script>

<?php
//DEBUG
//print var_dump($arrSecao);
?>
