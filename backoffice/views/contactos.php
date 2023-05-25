<?php
require("../componentes/php_main.php");
$rota="contactos";

$contactos = selectSQLUnico("SELECT * FROM contactos");

$form = isset($_GET["edit"]);
$form_edit = isset($_POST["telefone"]) && isset($_POST["e_mail"]) && isset($_POST["horario"]) && isset($_POST["morada"]);
if($form_edit){
    iduSQL("UPDATE contactos SET telefone='$_POST[telefone]', morada='$_POST[morada]', e_mail='$_POST[e_mail]', horario='$_POST[horario]'");
}

?>
<?php require("../componentes/header.php"); ?>

<main>
    <?php if(!$form): ?>

    <div class="caixa">
        <h1>Editar Contactos</h1>
        <hr>
        <table>
            <tr>
                <td>telefone</td>
                <td>morada</td>
                <td>E-mail</td>
                <td>horario</td>
            </tr>
            <tr>
                <td>
                    <?= $contactos["telefone"] ?>
                </td>
                <td>
                    <?= $contactos["morada"] ?>
                </td>
                <td>
                    <?= $contactos["e_mail"] ?>
                </td>
                <td>
                    <?= $contactos["horario"] ?>
                </td>
            </tr>
        </table>
        <hr>
        <a href="contactos.php?edit=true"><button class="saber-mais">editar</button></a>
        <hr>
    </div>

    <?php elseif($form && !$form_edit): ?>

    <div class="caixa">
        <h3>Editar Contactos</h3>
        <hr>
        <form class="form_inputs" id="form1" method="post">
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" value="<?= $contactos["telefone"] ?>">
            <label for="morada">Morada:</label>
            <input type="text" name="morada" id="morada" value="<?= $contactos["morada"] ?>">
            <label for="e_mail">E-mail:</label>
            <input type="text" name="e_mail" id="e_mail" value="<?= $contactos["e_mail"] ?>">
            <label for="horario">Horário</label>
            <input type="text" name="horario" id="horario" value="<?= $contactos["horario"] ?>">
        </form>
        <hr>
        <button class="saber-mais" type="submit" form="form1" value="Submit">Editar</button>
        <hr>
    </div>

    <?php else: ?>

    <div class="caixa">
        <h3>contactos editados com sucesso!</h3>
        <hr>
        <a href="contactos.php"><button class="saber-mais">Voltar</button></a>
        <hr>
    </div>

    <?php endif; ?>
</main>

<?php require("../componentes/footer.php") ?>
