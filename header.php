<?php

$contagemSecao= count(Secao::findAll());
$arrSecao = [];

for ($ordem = 0; $ordem < $contagemSecao; $ordem++) {
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
                <?php foreach ($arrSecao as $secao) {
                    $navItem =  '<li class="nav-item">'.PHP_EOL;
                    $navItem .= '<a class="nav-link" href="#" onclick="mudaSecao(this,'.$secao->getOrdem().')">'.ucfirst($secao->getNome()).'</a>'.PHP_EOL;
                    $navItem .= '</li>'.PHP_EOL;
                    print $navItem;
                }?>
                <!--//ADMIN-->
                <?php
                $navItemAdmin =  '<li class="nav-item">'.PHP_EOL;
                $navItemAdmin .= '<a class="nav-link" href="#" onclick="mudaSecao(this,`admin`)">Administrador</a>'.PHP_EOL;
                $navItemAdmin .= '</li>'.PHP_EOL;
                print $navItemAdmin;
                ?>
            </ul>
        </div>
    </nav>
</header>
