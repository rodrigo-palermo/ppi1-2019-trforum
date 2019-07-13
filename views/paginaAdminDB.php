<h2>Banco de Dados</h2>

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
        $rowData .= "<td><div class='btn-group'>".PHP_EOL;
        $rowData .= "<button type='button' class='btn btn-primary' onclick='acaoAdm(`secao`, `editar&id=".$secao->getId()."`)'>Editar</button>";
        $rowData .= "<br><br><button type='button' class='btn btn-danger' onclick='acaoAdm(`secao`, `excluir`)'>Excluir</button>".PHP_EOL;
        $rowData .= "</div></td>".PHP_EOL;
        $rowData .= "</tr>".PHP_EOL;
        print $rowData;
    } ?>

    </tbody>
</table>

<h3>Fórum</h3>

<table class="table">
    <thead>
    <tr><th>Id</th>
        <th>Id da Seção - colocar o nome da Seção</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($arrForum as $forum) {
        $rowData =  "<tr>".PHP_EOL;
        $rowData .= "<td>".$forum->getId()."</td>".PHP_EOL;
        $rowData .= "<td>".$forum->getIdSecao()."</td>".PHP_EOL;
        $rowData .= "<td>".$forum->getNome()."</td>".PHP_EOL;
        $rowData .= "<td>".$forum->getDescricao()."</td>".PHP_EOL;
        $rowData .= "<td><div class='btn-group'>".PHP_EOL;
        $rowData .= "<button type='button' class='btn btn-primary' onclick='acaoAdm(`forum`, `editar&id=".$forum->getId()."`)'>Editar</button>";
        //todo: implementar views e controllers forum
        $rowData .= "<br><br><button type='button' class='btn btn-danger' onclick='acaoAdm(`forum`, `excluir`)'>Excluir</button>".PHP_EOL;
        $rowData .= "</div></td>".PHP_EOL;
        $rowData .= "</tr>".PHP_EOL;
        print $rowData;
    } ?>

    </tbody>
</table>