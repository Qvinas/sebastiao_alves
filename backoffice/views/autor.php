<?php

require("../componentes/php_main.php");

$rota="autor";

$autor = selectSQLUnico("SELECT * FROM autor");

$form = isset($_GET["edit"]);

$form_edit = isset($_POST["imagem"]) && isset($_POST["texto"]);
if($form_edit){
    iduSQL("UPDATE autor SET imagem='$_POST[imagem]', texto='$_POST[texto]'");
}

?>
<?php require("../componentes/header.php"); ?>

<main>
    <?php if(!$form): ?>

    <div class="caixa">
        <h1>Editar autor</h1>
        <hr>
        <table>
            <tr>
                <td>Imagem - Autor</td>
                <td>Texto</td>
            </tr>
            <tr>
                <td class="img_xl"><img src="<?= $autor["imagem"] ?>"></td>
                <td><?= concatenar($autor["texto"], 200) ?></td>
            </tr>
        </table>
        <hr>
        <a href="autor.php?edit=true"><button class="saber-mais">editar</button></a>
        <hr>
    </div>

    <?php elseif($form && !$form_edit): ?>

    <div class="caixa">
        <h1>Editar Autor</h1>
        <hr>
        <form class="form_inputs" id="form1" method="post">
            
            <input type="hidden" name="edit" value="<?= $_GET["edit"] ?>">
            <label for="imagem">
                Imagem:
                <input type="text" name="imagem" id="imagem" value="<?= $autor["imagem"] ?>">
                <a onclick="window.open('../filemanager/tinyfilemanager.php','newwindow','width=700,height=500'); return false;" href="">
                    <button type="button">Procurar Imagem</button>
                </a>
            </label>

            <label for="texto">Texto:</label>
            <textarea name="texto" id="texto" cols="30" rows="10">
                <?= $autor["texto"] ?>
            </textarea>
        </form>
        <hr>
        <button class="saber-mais" type="submit" form="form1" value="Submit">Editar</button>
        <hr>
    </div>

    <?php else: ?>

    <div class="caixa">
        <h3>autor editado com sucesso!</h3>
        <hr>
        <a href="autor.php"><button class="saber-mais">Voltar</button></a>
        <hr>
    </div>

    <?php endif; ?>

</main>

<script>
    ClassicEditor
        .create( document.querySelector( '#texto' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<?php require("../componentes/footer.php") ?>
