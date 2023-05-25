<?php
require("../componentes/php_main.php");
$rota="livros";

$livros = selectSQL("SELECT * FROM livros");
$form = isset($_GET["id"]);

if($form){
    $livro = selectSQLUnico("SELECT * FROM livros WHERE id = '$_GET[id]'");
}

$form_edit = isset($_POST["id"]) && isset($_POST["imagem"]) && isset($_POST["titulo"]) && isset($_POST["texto"]);
if($form_edit){

    $livro = selectSQLUnico("SELECT * FROM livros WHERE id = '$_POST[id]'");
    $imagem = $_POST["imagem"];
    $titulo = $_POST["titulo"];
    $texto = $_POST["texto"];

    novaAtualizacaoLivros($_POST["id"]);

    iduSQL("UPDATE livros SET imagem='$imagem', titulo='$titulo', texto='$texto' WHERE id = '$_POST[id]'");
    $livro = selectSQLUnico("SELECT * FROM livros WHERE id = '$_POST[id]'");
}

$new = isset($_GET["new"]);
$new_input = isset($_POST["new"]) && isset($_POST["imagem"]) && isset($_POST["titulo"]) && isset($_POST["texto"]);
if($new_input){

    $imagem = $_POST["imagem"];
    $titulo = $_POST["titulo"];
    $texto = $_POST["texto"];

    iduSQL("INSERT INTO livros (imagem, titulo, texto) VALUES ('$imagem', '$titulo', '$texto')");
    $livro = selectSQLUnico("SELECT * FROM livros ORDER BY id DESC");
}

$delete = isset($_GET["delete"]);
$delete_confirm = isset($_POST["delete"]);
if($delete){
    $livro = selectSQLUnico("SELECT * FROM livros WHERE id = '$_GET[delete]'");
}
if($delete_confirm){
    iduSQL("DELETE FROM livros WHERE id='$_POST[delete]'");
}
?>

<?php require("../componentes/header.php"); ?>

<main>
    <?php if(!$form && !$new && !$delete): ?>

    <div class="caixa">
        <h1>editar Livros</h1>
        <hr>
        <table>
            <tr>
                <td>id</td>
                <td>imagem</td>
                <td>titulo</td>
                <td>texto</td>
                <td>Data Atualização</td>
                <td>acções</td>
            </tr>
            <?php foreach($livros as $i => $c): ?>
                <tr>
                    <td><?= $c["id"]?></td>
                    <td><img src="<?= $c["imagem"] ?>"></td>
                    <td><?= $c["titulo"] ?></td>
                    <td><?= concatenar($c["texto"]) ?></td>
                    <td><?= $c["ultima_atualizacao"] ?></td>
                    <td><a class="hover-green" href="livros.php?id=<?= $c["id"] ?>">Editar</a>|<a class="hover-red" href="livros.php?delete=<?= $c["id"] ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>    
        </table>
        <hr>
        <a href="livros.php?new=true"><button class="saber-mais">Novo livro</button></a>
        <hr>
    </div>

    <?php elseif($form && !$form_edit): ?>

    <div class="caixa">
        <h1>Editar Livro - <?= $livro["titulo"] ?></h1>
        <hr>
        <form class="form_inputs" id="form1" method="post">
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            
            <label for="imagem">
                Imagem:
                <input type="text" name="imagem" id="imagem" value="<?= $livro["imagem"] ?>">
                <a onclick="window.open('../filemanager/tinyfilemanager.php','newwindow','width=700,height=500'); return false;" href="">
                    <button type="button">Procurar Imagem</button>
                </a>
            </label>

            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" value="<?= $livro["titulo"] ?>">

            <label for="texto">Texto:</label>
            <textarea name="texto" id="texto" value="" cols="30" rows="10">
                <?= $livro["texto"] ?>
            </textarea>
        </form>
        <hr>
        <button class="saber-mais" type="submit" form="form1" value="Submit">Editar</button>
        <hr>
    </div>

    <?php elseif($form_edit): ?>

    <div class="caixa">
        <h3>Livro editado com sucesso - <?= $livro["titulo"] ?></h3>
        <hr>
        <table>
            <tr>
                <td>id</td>
                <td>imagem</td>
                <td>titulo</td>
                <td>texto</td>
                <td>Data Atualização</td>
            </tr>
                <tr>
                    <td><?= $livro["id"]?></td>
                    <td><img src="<?= $livro["imagem"] ?>"></td>
                    <td><?= $livro["titulo"] ?></td>
                    <td><?= concatenar($livro["texto"]) ?></td>
                    <td><?= $livro["ultima_atualizacao"] ?></td>
                </tr>
        </table>
        <a href="livros.php"><button class="saber-mais">Voltar</button></a>
    </div>

    <?php elseif($new && !$new_input): ?>

    <div class="caixa">
        <h1>Novo Livro</h1>
        <hr>
        <form class="form_inputs" id="form1" method="post">
            <input required="required" type="hidden" name="new" value="<?= $_GET["new"] ?>">
            <label for="imagem">
                Imagem:
                <input type="text" name="imagem" id="imagem">
                <a onclick="window.open('../filemanager/tinyfilemanager.php','newwindow','width=700,height=500'); return false;" href="">
                    <button type="button">Procurar Imagem</button>
                </a>
            </label>
            <label for="titulo">Titulo:</label>
            <input required="required" type="text" name="titulo" id="titulo">
            <label for="texto">Texto:</label>
            <textarea name="texto" id="texto2" cols="30" rows="10">
            </textarea>
        </form>
        <hr>
        <button class="saber-mais" type="submit" form="form1" value="Submit">Criar</button>
        <hr>
    </div>

    <?php elseif($new_input): ?>

    <div class="caixa">
        <h3>Livro criado com sucesso - <?= $livro["titulo"] ?></h3>
        <hr>
        <table>
            <tr>
                <td>id</td>
                <td>imagem</td>
                <td>titulo</td>
                <td>texto</td>
            </tr>
                <tr>
                    <td><?= $livro["id"]?></td>
                    <td><img src="<?= $livro["imagem"] ?>"></td>
                    <td><?= $livro["titulo"] ?></td>
                    <td><?= concatenar($livro["texto"]) ?></td>
                </tr>
        </table>
        <a href="livros.php"><button class="saber-mais">Voltar</button></a>
    </div>

    <?php elseif($delete && !$delete_confirm): ?>

    <div class="caixa">
        <h3>Tem a certeza que pretende excluir este livro? - <?= $livro["titulo"] ?></h3>
        <hr>
        <table>
            <tr>
                <td>id</td>
                <td>imagem</td>
                <td>titulo</td>
                <td>texto</td>
                <td>Data Atualização</td>
            </tr>
                <tr>
                    <td><?= $livro["id"]?></td>
                    <td><img src="<?= $livro["imagem"] ?>"></td>
                    <td><?= $livro["titulo"] ?></td>
                    <td><?= concatenar($livro["texto"]) ?></td>
                    <td><?= $livro["ultima_atualizacao"] ?></td>
                </tr>
        </table>
        <form id="form1" method="post">
            <input type="hidden" name="delete" value="<?= $_GET["delete"] ?>">
        </form>
        <hr>
        <button class="back-red saber-mais" type="submit" form="form1" value="Submit">Confirmar</button>
        <a href="livros.php"><button class="saber-mais">Voltar Atras</button></a>
        <hr>

    </div>

    <?php elseif($delete_confirm): ?>

        <div class="caixa">
            <h3>livro excluido com successo</h3>
            <hr>
            <a href="livros.php"><button class="saber-mais">Voltar Atras</button></a>
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
    ClassicEditor
        .create( document.querySelector( '#texto2' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<?php require("../componentes/footer.php") ?>