<h2>Dados dos objetos</h2>

<h3>Seção</h3>
<button type="button" class="btn btn-primary" onclick='acaoAdm(`secao`, `criar`)'>Novo</button>
<table class="table">
    <thead>
    <tr><th>Id</th>
        <th>Ordem</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($arrSecao as $secao) {
        $rowData =  "<tr>".PHP_EOL;
        $rowData .= "<td>".$secao->getId()."</td>".PHP_EOL;
        $rowData .= "<td>".$secao->getOrdem()."</td>".PHP_EOL;
        $rowData .= "<td>".$secao->getNome()."</td>".PHP_EOL;
        $rowData .= "<td>".$secao->getDescricao()."</td>".PHP_EOL;
        $rowData .= "<td><button type='button' class='btn btn-primary' onclick='acaoAdm(`secao`, `editar&id=".$secao->getId()."`)'>Editar</button>";
        $rowData .=     "<br><br><button type='button' class='btn btn-danger' onclick='acaoAdm(`secao`, `excluir`)'>Excluir</button></td>".PHP_EOL;
        $rowData .= "</tr>".PHP_EOL;
        print $rowData;
    } ?>

    </tbody>
</table>