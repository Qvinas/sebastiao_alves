<?php
require("../componentes/php_main.php");
$rota="inicio";

$acesso = selectSQLUnico("SELECT * From acessos ORDER BY id DESC");

?>
<?php require("../componentes/header.php"); ?>
<main>
    <div class="caixa">
        <h1>Bem Vindo <?= $user["nome"] ?></h1>
        <p>O seu último acesso foi em: <span class="accent"><?= $acesso["data"] ?></span></p>
        <hr>
    </div>
</main>
<?php require("../componentes/footer.php") ?>