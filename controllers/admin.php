<?php
require_once __DIR__ . '/../headLinkClasses.php';

// Listas para uso do ADMIN
try {


    $arrSecao = SecaoDAO::findAll();
    $arrForum = Forum::findAll();
    $arrPerfil = Perfil::findAll();
    $arrUsuario = Usuario::findAll();

    if (isset($_POST['classe'])) {

        switch ($_POST['classe']) {

            case 'secao':
                $secao = new Secao();
                $secao->setOrdem($_POST['ordem']);
                $secao->setNome($_POST['nome']);
                $secao->setDescricao($_POST['descricao']);
                if (isset($_POST['submitEditar']) || isset($_POST['excluir'])) {
                    $secao->setId($_POST['id']);
                    if (isset($_POST['submitEditar'])) {
                        $secao->update();
                    } else { //$_POST['excluir'])
                        $secao->delete();
                    }
                } else {
                    $secao->insert();
                }
                break;

            case 'forum':
                $forum = new Forum();
                $forum->setIdSecao($_POST['id_secao']);
                $forum->setNome($_POST['nome']);
                $forum->setDescricao($_POST['descricao']);
                $forum->setImagem($_POST['imagem']);
                if (isset($_POST['submitEditar']) || isset($_POST['excluir'])) {
                    $forum->setId($_POST['id']);
                    if (isset($_POST['submitEditar'])) {
                        $forum->update();
                    } else { //$_POST['excluir'])
                        $forum->delete();
                    }
                } else {
                    $forum->insert();
                }
                break;

            case 'topico':
                $date = new DateTime('now');
                //$data_hora_criacao = date("Y-m-d ", strtotime(str_replace('/','-', $_POST['data_hora_criacao'])));
                $data_hora_criacao = $date->format('Y-m-d H:i:s');
                $topico = new Topico();
                $topico->setIdForum($_POST['id_forum']);
                $topico->setIdUsuario($_POST['id_usuario']);
                $topico->setNome($_POST['nome']);
                $topico->setDescricao($_POST['descricao']);
                $topico->setDataHora($data_hora_criacao);
                if (isset($_POST['submitEditar']) || isset($_POST['excluir'])) {
                    $topico->setId($_POST['id']);
                    if (isset($_POST['submitEditar'])) {
                        $topico->update();
                    } else { //$_POST['excluir'])
                        $topico->delete();
                    }
                } else {
                    $topico->insert();
                }
                break;

            case 'post':
                $date = new DateTime('now');
                //$data_hora_criacao = date("Y-m-d ", strtotime(str_replace('/','-', $_POST['data_hora_criacao'])));
                $data_hora_criacao = $date->format('Y-m-d H:i:s');
                $post = new Post();
                $post->setIdTopico($_POST['id_topico']);
                $post->setIdUsuario($_POST['id_usuario']);
                $post->setNome($_POST['nome']);
                $post->setDescricao(addslashes($_POST['descricao']));
                $post->setDataHora($data_hora_criacao);
                if (isset($_POST['submitEditar']) || isset($_POST['excluir'])) {
                    $post->setId($_POST['id']);
                    if (isset($_POST['submitEditar'])) {
                        $post->update();
                    } else { //$_POST['excluir'])
                        $post->delete();
                    }
                } else {
                    $post->insert();
                }
                break;

            case 'perfil':
                $perfil = new Perfil();
                $perfil->setNome($_POST['nome']);
                if (isset($_POST['submitEditar']) || isset($_POST['excluir'])) {
                    $perfil->setId($_POST['id']);
                    if (isset($_POST['submitEditar'])) {
                        $perfil->update();
                    } else { //$_POST['excluir'])
                        $perfil->delete();
                    }
                } else {
                    $perfil->insert();
                }
                break;

            case 'usuario':
                $data_inscricao = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['data_inscricao'])));
                $usuario = new Usuario();
                $usuario->setIdPerfil($_POST['id_perfil']);
                $usuario->setLogin($_POST['login']);
                $usuario->setSenha($_POST['senha']);
                $usuario->setNome($_POST['nome']);
                $usuario->setDataInscricao($data_inscricao);
                $usuario->setImagem($_POST['imagem']);
                $usuario->setAssinatura($_POST['assinatura']);
                if (isset($_POST['submitEditar']) || isset($_POST['excluir'])) {
                    $usuario->setId($_POST['id']);
                    if (isset($_POST['submitEditar'])) {
                        $usuario->update();
                    } else { //$_POST['excluir'])
                        $usuario->delete();
                    }
                } else {
                    $usuario->insert();
                }
                break;
        }
    }
    ?>
    <script>

        function acaoAdm(table, crud) {
            $('section').load('controllers/admin_create_update.php?table=' + table + '&crud=' + crud);
        };

        function acaoAdmExcluir(table, id) {
            var loc = window.location.pathname;
            var dir = loc.substring(0, loc.lastIndexOf('/'));

            if (confirm('Confirma apagar dados?')) {
                $.ajax({
                    type: 'POST',
                    url: dir + '/controllers/admin.php',
                    data:
                        {
                            excluir: 1,
                            classe: table,
                            id: id
                        },
                    dataType: "text",
                    success: function () {
                        alert('Dados apagados com sucesso.');
                        voltarMesmaSecao(`admin`);

                    },
                    error: function () {
                        alert('Sem dados cadastrados.');
                    }
                });

            }
        };
    </script>

    <?php
    require_once __DIR__ . '/../views/paginaAdminDB.php';
} catch (PDOException $e) {
    echo 'Erro de banco: '.$e;
}
?>

