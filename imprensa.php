<?php

require_once("config/config.php");
require_once("config/base_dados.php");
require_once("config/funcoes.php");

$pagina_atual = (isset($_GET["pagina_atual"])) ? intval($_GET["pagina_atual"]) : 1;

$total_elementos = selectSQLUnico("SELECT Count(*) AS total FROM imprensa")["total"];

$por_pagina = 2;
$total_pagina = ceil($total_elementos / $por_pagina);
$offset = (intval($pagina_atual) - 1) * $por_pagina;

$imprensa = selectSQL("SELECT * FROM imprensa  ORDER BY data DESC LIMIT 2 OFFSET $offset");

$rota = "imprensa";

?>
<?php require("componentes/header.php") ?>

<main>
  <div class="main-imprensa">
    <?php for ($i = 0; $i < count($imprensa); $i++) : ?>
      <div class="caixa-imprensa <?= ($i == (count($imprensa) - 1)) ? 'ultima-imprensa' : ''; ?>">
        <div class="conteudo-imprensa">
          <h1><?= $imprensa[$i]["titulo"] ?></h1>
          <hr>
          <p class="data-publicacao">
            <?= dataNova($imprensa[$i]["data"]) ?>
          </p>
          <img src="<?= $imprensa[$i]['imagem'] ?>" alt="<?= $imprensa[$i]["titulo"] ?>">
          <?php if (!empty($imprensa[$i]["texto"])) : ?>
            <p class="conteudo-publicacao">
              <?= $imprensa[$i]["texto"] ?>
            </p>
          <?php endif; ?>
        </div>
      </div>
    <?php endfor; ?>
  </div>

  <div class="paginacao">
    <form>
      <button class="seta" name="pagina_atual" value="<?= (1 < $pagina_atual) ? ($pagina_atual - 1) : '1' ?>" <?= (1 >= $pagina_atual) ? "disabled" : null ?>><img src="recursos\imagens_para_site\desktop\setaesquerda1.svg"></button>
      <div class="numeros_pagina">
        <?php for ($i = 1; $i <= $total_pagina; $i++) : ?>
          <button class="numero <?= ($i == $pagina_atual) ? 'selected' : null; ?>" name="pagina_atual" value="<?= $i ?>"><?= $i ?></button>
        <?php endfor; ?>
      </div>
      <button class="seta" name="pagina_atual" value="<?= ($total_pagina > $pagina_atual) ? ($pagina_atual + 1) : 'none' ?> <?= ($total_pagina <= $pagina_atual) ? "disabled" : '' ?>"><img src="recursos\imagens_para_site\desktop\setadireita1.svg"></button>
    </form>
  </div>
</main>

<?php require("componentes/footer.php") ?>