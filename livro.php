<?php

require_once("config/config.php");
require_once("config/base_dados.php");

$form = isset($_GET["livro"]);

if ($form) {
  $rota = "livros";
  $livro = selectSQLUnico("SELECT * FROM livros WHERE id='$_GET[livro]'");
} else {
  header("Location: index.php");
}

?>
<?php require("componentes/header.php") ?>

<main>
  <div class="main-livro">
    <img src="<?= $livro["imagem"]; ?>" alt="<?= $livro["titulo"] ?>" class="col-5">
    <div class="texto">
      <p>
        <?= $livro["texto"]; ?>
      </p>

      <div class="main-button">
        <a onclick="history.back()"><button class="voltar-atras">Voltar atras</button></a>
      </div>
    </div>
  </div>
</main>

<?php require("componentes/footer.php") ?>