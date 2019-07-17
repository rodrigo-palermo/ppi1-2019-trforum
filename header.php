<?php
$contagemSecao= count(Secao::findAll());
$arrSecao = [];

for ($ordem = 1; $ordem <= $contagemSecao; $ordem++) {
    $arrSecao[$ordem] = Secao::findByOrder($ordem);
}
?>


<header class="sticky-top">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">TOMB RAIDER FORUM</a>

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
                    $navItemLogin = '<li class="nav-item" style="float: right;">' . PHP_EOL;
                    $navItemLogin .= '<button id="nav-btn-login" type="button" class="btn btn-info" href="#" onclick="abreLogin(this,`login`)">LOGIN</button>' . PHP_EOL;
                    $navItemLogin .= '</li>' . PHP_EOL;
                    print $navItemLogin;
                }
                ?>
                <!--//LOGOUT-->
                <?php
                if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {
                    $navItemLogout = '<li class="nav-item" style="float: right;">' . PHP_EOL;
                    $navItemLogout .= '<button id="nav-btn-logout" type="button" class="btn btn-danger" href="#" onclick="logout()">SAIR</button>' . PHP_EOL;
                    $navItemLogout .= '</li>' . PHP_EOL;
                    print $navItemLogout;
                }
                ?>
            </ul>
        </div>
    </nav>
</header>
