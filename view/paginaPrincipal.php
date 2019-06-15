<!DOCTYPE html>
<html>
<head>
    <title>TOMB RAIDER</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./trfavicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
<header>
    <div id=container>
        <h1>TOMB RAIDER</h1>
        <nav>
            <ul>
                <li>
                    <a id="nav1" class="selected" onclick="mudaSecao(this,'tempPrincipal')" href="#">Principal</a>
                </li>
                <li>
                    <a id='nav2' href="#" onclick="mudaSecao(this,'tempJogos')">Jogos</a>
                </li>
                <li>
                    <a id='nav3' href="#" onclick="mudaSecao(this,'tempFilmes')">Filmes</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<main>
    <section id="principal" class="active">
        <?php require_once 'view/tempPrincipal.php';?>
    </section>
    <!--<section id="jogos"></section>
    <section id="filmes"></section>-->
    <aside>
        <div class='asidecontainer'>
            <h3>Tomb Raider 1</h3>
            <p>
                Tomb Raider é um videojogo de ação-aventura, décimo título da série Tomb Raider e o quinto produzido pela Crystal Dynamics.
            </p>
        </div>
        <div class='asidecontainer'>
            <h3>Tomb Raider 2</h3>
            <p>
                Tomb Raider é um videojogo de ação-aventura, décimo título da série Tomb Raider e o quinto produzido pela Crystal Dynamics.
            </p>
        </div>
        <div class='asidecontainer'>
            <h3>Tomb Raider 3</h3>
            <p>
                Tomb Raider é um videojogo de ação-aventura, décimo título da série Tomb Raider e o quinto produzido pela Crystal Dynamics.
            </p>
        </div>
        <div class='asidecontainer'>
            <h3>Tomb Raider 4</h3>
            <p>
                Tomb Raider é um videojogo de ação-aventura, décimo título da série Tomb Raider e o quinto produzido pela Crystal Dynamics.
            </p>
        </div>

    </aside>
</main>
<footer>
    &copy; Rodrigo Palermo
</footer>
</body>
<script>
    function mudaSecao(thisNav, thisSec) {
        $('.selected')[0].className = '';
        thisNav.className = 'selected';
        //$('.active')[0].className = '';
        //document.getElementById(thisSec).className = 'active';
        $('section').load("view/" + thisSec + ".php");
    }
</script>
</html>