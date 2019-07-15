<?php
require_once __DIR__ . '/../headLinkClasses.php';

$arrSecao = Secao::findAll();
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
            $usuario = new usuario();
            $usuario->setIdPerfil($_POST['id_perfil']);
            $usuario->setLogin($_POST['login']);
            $usuario->setSenha($_POST['senha']);
            $usuario->setNome($_POST['nome']);
            $usuario->setDstaInscricao($_POST['data_inscricao']);    VER COMO DATA ESTA SENDo GRAVADA
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

    function acaoAdm(table, crud){
        $('section').load('controllers/admin_create_update.php?table='+ table +'&crud=' + crud);
    };

    function acaoAdmExcluir(table, id){
        var loc = window.location.pathname;
        var dir = loc.substring(0, loc.lastIndexOf('/'));

        if (confirm('Confirma apagar dados?')) {
            $.ajax({
                type: 'POST',
                url: dir + '/controllers/admin.php',
                data:
                    {excluir: 1,
                        classe: table,
                        id: id},
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
?>

