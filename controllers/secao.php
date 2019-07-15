<?php
require_once __DIR__ . '/../headLinkClasses.php';

if(isset($_GET['secaoOrdem'])) {

    $secao = Secao::findByOrder($_GET['secaoOrdem']);

    $secaoNome = ucfirst($secao->getNome());
    $secaoDescricao = addslashes(str_replace(PHP_EOL, '', $secao->getDescricao()));

    print "<h2>" . $secaoNome . "</h2>";
    print $secaoDescricao;

    print "<h4>Fóruns</h4>";

    $arrObjeto = Forum::findAllByIdSecao($secao->getId());

    if (!empty($arrObjeto)) {
        foreach ($arrObjeto as $objeto) {

            ?>
            <div class="media border p-3">
                <img src="img/<?= $objeto->getImagem()?>" alt="Forum" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                <div class="media-body">
                    <a class="nav-link" href="#" onclick="abreForum('<?=$objeto->getIdSecao()?>','<?=$objeto->getId()?>')"><h4><?php print $objeto->getNome();?>
                    </h4></a>
                    <p><?php print $objeto->getDescricao();?></p>
                </div>
            </div>
            <?php
        }
    }
    else {
        print "<h5>Esta seção ainda não possui nenhum fórum</h5>";
    }

}
else {
    require_once __DIR__.'/../notFound.php';
}