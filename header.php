<?php
try{
$contagemSecao= count(SecaoDAO::findAll());
$arrSecao = [];

for ($ordem = 1; $ordem <= $contagemSecao; $ordem++) {
    $arrSecao[$ordem] = SecaoDAO::findByOrder($ordem);
}
}catch(PDOException $e){
    echo 'Erro ao conectar ao banco: '.$e;
}
?>


<header class="sticky-top">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark flex-row flex-md-row bd-navbar">
        <!-- Brand -->
        <a class="navbar-brand mr-0 mr-md-2" href="#">TOMB RAIDER FORUM</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a id='navHome' class="nav-link active" href="#" onclick="mudaSecao(this,'principal')">Home</a>
                </li>
                <?php $navItem =  '<li class="nav-item">'.PHP_EOL;
                    $navItem .= '<a id="auxLogin" class="nav-link" hidden></a>'.PHP_EOL;
                    $navItem .= '</li>';
                    print $navItem;
                    ?>
                <?php foreach ($arrSecao as $secao) {
                    $navItem =  '<li class="nav-item">'.PHP_EOL;
                    $navItem .= '<a class="nav-link" href="#" onclick="mudaSecao(this,'.$secao->getOrdem().')">'.ucfirst($secao->getNome()).'</a>'.PHP_EOL;
                    $navItem .= '</li>'.PHP_EOL;
                    print $navItem;
                }?>
            </ul>
            <ul class="navbar-nav bd-navbar-nav ml-auto">
                <!--//ADMIN-->
                <?php
                if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true && isset($_SESSION['perfil']) && $_SESSION['perfil'] == 1) { //(id_perfil ou cod_perfil) = 1 para ADMIN
                    $navItemAdmin = '<li class="nav-item">' . PHP_EOL;
                    $navItemAdmin .= '<a class="nav-link" href="#" onclick="mudaSecao(this,`admin`)">Administrador</a>' . PHP_EOL;
                    $navItemAdmin .= '</li>' . PHP_EOL;
                    print $navItemAdmin;
                }
                ?>
                <!--//LOGIN-->
                <?php
                if (!isset($_SESSION['autenticado']) || (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == false)) {
                    $navItemLogin = '<li class="nav-item ">' . PHP_EOL;
                    $navItemLogin .= '<button id="nav-btn-login" type="button" class="btn btn-outline-info" href="#" onclick="abreLogin(this,`login`)">LOGIN</button>' . PHP_EOL;
                    $navItemLogin .= '</li>' . PHP_EOL;
                    print $navItemLogin;
                }
                ?>
                <!--//LOGOUT-->
                <?php
                if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {
                    $navItemLogout = '<li class="nav-item">' . PHP_EOL;
                    $navItemLogout .= '<button id="nav-btn-logout" type="button" class="btn btn-outline-danger" href="#" onclick="logout()">SAIR</button>' . PHP_EOL;
                    $navItemLogout .= '</li>' . PHP_EOL;
                    print $navItemLogout;
                    ?>
                    <li  class="nav-item"><img class="rounded-circle " src="img/<?= Usuario::findById($_SESSION['id_usuario'])->getImagem()?>" alt="Avatar do Usuario"  style="width:38px; margin:2px 10px"></li>;
                <?php

                }
                ?>
            </ul>
        </div>
    </nav>
</header>
