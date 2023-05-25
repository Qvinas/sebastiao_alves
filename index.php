<?php

require_once("config/config.php");
require_once("config/base_dados.php");

$home = selectSQLUnico("SELECT * FROM home");
$destaques = selectSQL("SELECT livros.texto, livros.id, livros.imagem, livros.titulo, destaques.tag FROM livros INNER JOIN destaques ON livros.id=destaques.livro ORDER BY destaques.id");

$rota = "home";

?>
<?php require("componentes/header.php") ?>

<main>
  <div class="ultimos-livros">
    <h1>Últimos Livros</h1>
    <p>
      <?= $home["ultimos_livros"] ?>
    </p>
  </div>
  <div class="home-livros">
    <?php foreach ($destaques as $d) : ?>

      <div id="card-livros">
        <img src="<?= $d['imagem'] ?>" alt="<?= $d['titulo'] ?>">
        <div class="card-text">
          <h1 class="destaques"><?= $d['titulo'] ?></h1>
          <div class="categoria"><?= $d['tag'] ?></div>
          <p>
            <?= concatenar($d['texto'], 170) ?>
          </p>
          <a href="livro.php?livro=<?= $d['id'] ?>"><button class="saber-mais">Saber Mais</button></a>
        </div>
      </div>

    <?php endforeach; ?>
  </div>
</main>

<?php require("componentes/footer.php") ?>