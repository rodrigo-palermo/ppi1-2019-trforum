<h2>Banco de Dados</h2>

<ul class="nav nav-tabs">
    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#secao">Seção</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#forum">Fórum</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#perfil">Perfil</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#usuario">Usuário</a></li>
</ul>

<div class="tab-content">
    <div id="secao" class="container tab-pane active">
        <h3>Seção</h3>

        <button type="button" class="btn btn-outline-primary" onclick='acaoAdm(`secao`, `criar`)'>+</button>
        <br/><br/>
        <table class="table table-responsive">
            <thead>
            <tr>
<!--                <th>Id</th>-->
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
                // $rowData .= "<td>".$secao->getId()."</td>".PHP_EOL;
                $rowData .= "<td>".$secao->getOrdem()."</td>".PHP_EOL;
                $rowData .= "<td>".$secao->getNome()."</td>".PHP_EOL;
                $rowData .= "<td>".$secao->getDescricao()."</td>".PHP_EOL;
                $rowData .= "<td><div class='btn-group'>".PHP_EOL;
                $rowData .= "<button type='button' class='btn btn-outline-primary'";
                $rowData .= "onclick='acaoAdm(`secao`, `editar&id=".$secao->getId()."`)'>Editar</button>";
                $rowData .= "<br><br><button type='button' class='btn btn-outline-danger'";
                $rowData .= (Forum::countByIdSecao($secao->getId()))==0?"":"disabled='disabled'";
                $rowData .= "onclick='acaoAdmExcluir(`secao`,".$secao->getId().")'>Excluir</button>".PHP_EOL;
                $rowData .= "</div></td>".PHP_EOL;
                $rowData .= "</tr>".PHP_EOL;
                print $rowData;
            } ?>

            </tbody>
        </table>
    </div>

    <div id="forum" class="container tab-pane fade" >
        <h3>Fórum</h3>

        <button type="button" class="btn btn-outline-primary" onclick='acaoAdm(`forum`, `criar`)'>+</button>
        <br/><br/>
        <table class="table table-responsive">
            <thead>
            <tr>
<!--                <th>Id</th>-->
                <th>Seção</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($arrForum as $forum) {
                $rowData =  "<tr>".PHP_EOL;
                // $rowData .= "<td>".$forum->getId()."</td>".PHP_EOL;
                $rowData .= "<td>".($secao::findById($forum->getIdSecao()))->getNome()."</td>".PHP_EOL;
                $rowData .= "<td>".$forum->getNome()."</td>".PHP_EOL;
                $rowData .= "<td>".$forum->getDescricao()."</td>".PHP_EOL;
                $rowData .= "<td>".$forum->getImagem()."</td>".PHP_EOL;
                $rowData .= "<td><div class='btn-group'>".PHP_EOL;
                $rowData .= "<button type='button' class='btn btn-outline-primary'";
                $rowData .= "onclick='acaoAdm(`forum`, `editar&id=".$forum->getId()."`)'>Editar</button>";
                $rowData .= "<br><br><button type='button' class='btn btn-outline-danger'";
                //$rowData .= (Topico::countByIdForum($forum->getId()))==0?"":"disabled='disabled'";
                $rowData .= "onclick='acaoAdmExcluir(`forum`,".$forum->getId().")'>Excluir</button>".PHP_EOL;
                $rowData .= "</div></td>".PHP_EOL;
                $rowData .= "</tr>".PHP_EOL;
                print $rowData;
            } ?>

            </tbody>
        </table>
    </div>

    <div id="perfil" class="container tab-pane fade" >
        <h3>Perfil</h3>

        <button type="button" class="btn btn-outline-primary" onclick='acaoAdm(`perfil`, `criar`)'>+</button>
        <br/><br/>
        <table class="table table-responsive">
            <thead>
            <tr>
<!--                <th>Id</th>-->
                <th>Nome</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($arrPerfil as $perfil) {
                $rowData =  "<tr>".PHP_EOL;
                // $rowData .= "<td>".$forum->getId()."</td>".PHP_EOL;
                $rowData .= "<td>".$perfil->getNome()."</td>".PHP_EOL;
                $rowData .= "<td><div class='btn-group'>".PHP_EOL;
                $rowData .= "<button type='button' class='btn btn-outline-primary'";
                $rowData .= "onclick='acaoAdm(`forum`, `editar&id=".$perfil->getId()."`)'>Editar</button>";
                $rowData .= "<br><br><button type='button' class='btn btn-outline-danger'";
                //$rowData .= (Topico::countByIdUsuario($perfil->getId()))==0?"":"disabled='disabled'";
                $rowData .= "onclick='acaoAdmExcluir(`perfil`,".$perfil->getId().")'>Excluir</button>".PHP_EOL;
                $rowData .= "</div></td>".PHP_EOL;
                $rowData .= "</tr>".PHP_EOL;
                print $rowData;
            } ?>

            </tbody>
        </table>
    </div>

    <div id="usuario" class="container tab-pane fade" >
        <h3>Usuário</h3>

        <button type="button" class="btn btn-outline-primary" onclick='acaoAdm(`usuario`, `criar`)'>+</button>
        <br/><br/>
        <table class="table table-responsive">
            <thead>
            <tr>
                <!--                <th>Id</th>-->
                <th>Perfil</th>
                <th>Login</th>
                <th>Senha</th>
                <th>Nome</th>
                <th>Data de inscrição</th>
                <th>Imagem</th>
                <th>Assinatura</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($arrUsuario as $usuario) {
                $rowData =  "<tr>".PHP_EOL;
                // $rowData .= "<td>".$forum->getId()."</td>".PHP_EOL;
                $rowData .= "<td>".($perfil::findById($usuario->getIdPerfil()))->getNome()."</td>".PHP_EOL;
                $rowData .= "<td>".$usuario->getLogin()."</td>".PHP_EOL;
                $rowData .= "<td>".$usuario->getSenha()."</td>".PHP_EOL;
                $rowData .= "<td>".$usuario->getNome()."</td>".PHP_EOL;
                $rowData .= "<td>".$usuario->getDataInscricao()."</td>".PHP_EOL;
                $rowData .= "<td>".$usuario->getImagem()."</td>".PHP_EOL;
                $rowData .= "<td>".$usuario->getAssinatura()."</td>".PHP_EOL;
                $rowData .= "<td><div class='btn-group'>".PHP_EOL;
                $rowData .= "<button type='button' class='btn btn-outline-primary'";
                $rowData .= "onclick='acaoAdm(`usuario`, `editar&id=".$usuario->getId()."`)'>Editar</button>";
                $rowData .= "<br><br><button type='button' class='btn btn-outline-danger'";
                //$rowData .= (Topico::countByIdForum($forum->getId()))==0?"":"disabled='disabled'";
                $rowData .= "onclick='acaoAdmExcluir(`usuario`,".$usuario->getId().")'>Excluir</button>".PHP_EOL;
                $rowData .= "</div></td>".PHP_EOL;
                $rowData .= "</tr>".PHP_EOL;
                print $rowData;
            } ?>

            </tbody>
        </table>
    </div>
</div>