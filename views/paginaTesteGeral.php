<?php
$arrSecao = Secao::findAll();
?>
<h3>Dados dos objetos</h3>

<table class="table">
    <thead>
    <tr><th>Id</th>
        <th>Nome</th>
        <th>Descrição</th></tr>
    </thead>
    <tbody>
    <?php
    foreach ($arrSecao as $secao) {
        print "<tr>";
        print "<td>".$secao->getId()."</td><td>".$secao->getNome()."</td><td>".$secao->getDescricao()."</td>";
        print "</td>";
    } ?>

    </tbody>
</table>
