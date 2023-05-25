
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BackOffice - Sebastião Alves</title>

        <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
        <link rel="stylesheet" href="../../style.css">
        <link rel="stylesheet" href="../style_backoffice.css">
    </head>

    <body>
        <header>
            <nav>
                <h4>BackOffice - Sebastião ALves</h4>
                <button onclick="toggleMenu()"><img id="backoffice_toggle"  src="../../recursos\imagens_para_site\desktop\menu.svg"></button>
                <ul>
                    <li><a class="<?= ($rota=="inicio") ? "ativo" : ""; ?>" href="home.php">Inicio</a></li>
                    <li><a class="<?= ($rota=="cabecalho") ? "ativo" : ""; ?>"href="cabecalho.php">Cabeçalho</a></li>
                    <li><a class="<?= ($rota=="home") ? "ativo" : ""; ?>"href="homepage.php">Home</a></li>
                    <li><a class="<?= ($rota=="autor") ? "ativo" : ""; ?>"href="autor.php">autor</a></li>
                    <li><a class="<?= ($rota=="livros") ? "ativo" : ""; ?>"href="livros.php">livros</a></li>
                    <li><a class="<?= ($rota=="destaques") ? "ativo" : ""; ?>"href="destaques.php">destaques</a></li>
                    <li><a class="<?= ($rota=="imprensa") ? "ativo" : ""; ?>"href="imprensa.php">imprensa</a></li>
                    <li><a class="<?= ($rota=="contactos") ? "ativo" : ""; ?>"href="contactos.php">contactos</a></li>
                    <li><a class="<?= ($rota=="redes") ? "ativo" : ""; ?>"href="redes.php">redes</a></li>
                    <li><a class="<?= ($rota=="configuracoes") ? "ativo" : ""; ?>"href="configuracoes.php">configurações</a></li>
                    <li><a href="../logout.php">sair</a></li>
                </ul>
            </nav>
        </header>