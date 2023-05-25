<?php
require("../componentes/php_main.php");
$rota="redes";

$redes = selectSQLUnico("SELECT * FROM redes");

$form = isset($_GET["edit"]);
$form_edit = isset($_POST["instagram"]) && isset($_POST["linkedin"]) && isset($_POST["facebook"]);
if($form_edit){
    iduSQL("UPDATE redes SET instagram='$_POST[instagram]', facebook='$_POST[facebook]', linkedin='$_POST[linkedin]'");
}

?>
<?php require("../componentes/header.php"); ?>
<main>
    <?php if(!$form): ?>

    <div class="caixa">
        <h1>Editar redes</h1>
        <hr>
        <table>
            <tr>
                <td>instagram</td>
                <td>facebook</td>
                <td>E-mail</td>
            </tr>
            <tr>
                <td>
                    <?= $redes["instagram"] ?>
                </td>
                <td>
                    <?= $redes["facebook"] ?>
                </td>
                <td>
                    <?= $redes["linkedin"] ?>
                </td>
            </tr>
        </table>
        <hr>
        <a href="redes.php?edit=true"><button class="saber-mais">editar</button></a>
        <hr>
    </div>

    <?php elseif($form && !$form_edit): ?>

    <div class="caixa">
        <h1>Editar redes</h1>
        <hr>
        <form class="form_inputs" id="form1" method="post">
            <label for="instagram">instagram:</label>
            <input type="text" name="instagram" id="instagram" value="<?= $redes["instagram"] ?>">
            <label for="facebook">facebook:</label>
            <input type="text" name="facebook" id="facebook" value="<?= $redes["facebook"] ?>">
            <label for="linkedin">E-mail:</label>
            <input type="text" name="linkedin" id="linkedin" value="<?= $redes["linkedin"] ?>">
        </form>
        <hr>
        <button class="saber-mais" type="submit" form="form1" value="Submit">Editar</button>
        <hr>
    </div>

    <?php else: ?>

        <div class="caixa">
            <h3">redes editados com sucesso!</h3>
            <hr>
            <a href="redes.php"><button class="saber-mais">Voltar</button></a>
            <hr>
        </div>

    <?php endif; ?>
</main>
<?php require("../componentes/footer.php") ?>
