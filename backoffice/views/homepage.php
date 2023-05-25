<?php
require("../componentes/php_main.php");
$rota="home";

$home = selectSQLUnico("SELECT * FROM home");

$form = isset($_GET["edit"]);
$form_edit = isset($_POST["imagem"]) && isset($_POST["ultimos_livros"]);
if($form_edit){
    iduSQL("UPDATE home SET imagem='$_POST[imagem]', ultimos_livros='$_POST[ultimos_livros]'");
    $home = selectSQLUnico("SELECT * FROM home");
}

?>

<?php require("../componentes/header.php"); ?>

<main>
    <?php if(!$form): ?>

    <div class="caixa">
        
        <h1>Editar Home</h1>
        <hr>
        <table>
            <tr>
                <td>Imagem - home</td>
                <td>Ultimos Livros</td>
            </tr>
            <tr>
                <td class="img_xl"><img src="<?= $home["imagem"] ?>"></td>
                <td><?= concatenar($home["ultimos_livros"], 300) ?></td>
            </tr>
        </table>
        <hr>
        <a href="homepage.php?edit=true"><button class="saber-mais">editar</button></a>
        <hr>

    </div>
  
    <?php elseif($form && !$form_edit): ?>
  
    <div class="caixa">

        <h1>Editar Home</h1>
        <hr>
        <form class="form_inputs" id="form1" method="post">
            <input type="hidden" name="edit" value="<?= $_GET["edit"] ?>">
            <label for="imagem">
                Imagem:
                <input type="text" name="imagem" id="imagem" value="<?= $home["imagem"] ?>">
                <a onclick="window.open('../filemanager/tinyfilemanager.php','newwindow','width=700,height=500'); return false;" href="">
                    <button type="button">Procurar Imagem</button>
                </a>
            </label>
            <label for="ultimos_livros">Texto:</label>
            <textarea name="ultimos_livros" id="ultimos_livros" cols="30" rows="10">
                <?= $home["ultimos_livros"] ?>
            </textarea>
        </form>
        <hr>
        <button class="saber-mais" type="submit" form="form1" value="Submit">Editar</button>
        <hr>

    </div>

    <?php else: ?>

        <div class="caixa">

            <h3>Home editado com sucesso!</h3>
            <hr>
            <a href="homepage.php"><button class="saber-mais">Voltar</button></a>
            <hr>

        </div>

    <?php endif; ?>
</main>

<script>
    ClassicEditor
        .create( document.querySelector( '#ultimos_livros' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<?php require("../componentes/footer.php") ?>
