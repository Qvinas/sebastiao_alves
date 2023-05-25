<?php 

require_once("config/config.php");
require_once("config/base_dados.php");
require_once("config/funcoes.php");

?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sebastiao Alves - <?= ucfirst($rota) ?></title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>

    <header>
        <div class="titles">
            <div class="wrapper-titles">
                <h1 class="titulo">Sebastião Alves</h1>
                <label onclick="navButton()" class="nav-toggler" for="nav-toggle">
                    <img id="nav_button" src="recursos\imagens_para_site\desktop\menu.svg">
                </label>
                <hr class="separador">
            </div>                    
            <input type="checkbox" id="nav-toggle" class="nav-toggle">
            <div class="navbar">
                <nav>
                    <ul>
                        <li><a class="<?= ($rota=="home") ? "active" : ""; ?>" href="index.php">home</a></li>
                        <li><a class="<?= ($rota=="autor") ? "active" : ""; ?>" href="autor.php">autor</a></li>
                        <li class="dropdown">
                            <a id="botao_livros" role="button" class="<?= ($rota=="livros") ? "active" : ""; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                    Livros
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach($lista_livros as $l): ?>
                                    <li><a class="dropdown-item" href="livro.php?livro=<?= $l["id"] ?>"><?= $l["titulo"] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                            </li>
                        <li><a class="<?= ($rota=="imprensa") ? "active" : ""; ?>" href="imprensa.php">imprensa</a></li>
                        <li><a class="<?= ($rota=="contactos") ? "active" : ""; ?>" href="contactos.php">contactos</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="carrosel col-12 p-0 mx-0">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-inner">
                    <?php $i=0 ?>
                    <?php foreach($carrosel as $c): ?>
                    <div class="carousel-item <?= ($i == 0) ? "active" : ""; ?>">
                        <picture>
                        <source srcset="<?= $c["imagem"]; ?>" media="(min-width: 810px)"/>
                        <img class="carousel-image" src="<?= $c["imagem_mobile"]; ?>" alt="example"/>
                        </picture>
                        <div class="banner-text">
                        <span class="categoria"><?= $c["tag"] ?></span>
                        <h1><?= $c["titulo"]; ?></h1>
                        <p>
                            <?= $c["sub_titulo"]; ?>
                        </p>
                        <a href="<?= $c["link"]; ?>"><button class="saber-mais">Saber Mais</button></a>
                        </div>
                    </div>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                </div>

                <div class="carousel-indicators col">
                    <?php for($i = 0; $i<count($carrosel); $i++): ?>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $i ?>" aria-label="Slide <?= ($i+1) ?>" <?= ($i==0) ? 'class="active" aria-current="true"' : "";?>></button>
                    <?php endfor; ?>
                </div>
                </div>
            </div>
        </div>

        <?php if($rota != "home"): ?>
            <div  id="target" class="title-banner">
                <?= headerText($rota, ((isset($_GET["livro"])) ? "$livro[titulo]" : "")) ?>
            </div>
        <?php else: ?>
            <div class="bem-vindo">
                <img class="bem-vindo-img" src="<?= $home["imagem"] ?>" alt="Sebastião Alves">
                <div class="welcome-text">
                    <h1>Bem-Vindo ao meu website</h1>
                    <?= concatenar($autor["texto"], 1200) ?>
                    <a href="autor.php"><button class="saber-mais">saber mais</button></a>
                </div>
            </div>
        <?php endif; ?>
    </header>
    <body>