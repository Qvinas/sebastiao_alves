<?php
require("../componentes/php_main.php");
$rota="imprensa";

$imprensas = selectSQL("SELECT * FROM imprensa");
$form = isset($_GET["id"]);

if($form){
    $imprensa = selectSQLUnico("SELECT * FROM imprensa WHERE id = '$_GET[id]'");
}

$form_edit = isset($_POST["id"]) && isset($_POST["imagem"]) && isset($_POST["titulo"]) && isset($_POST["texto"]) && isset($_POST["data"]);
if($form_edit){

    $imagem = $_POST["imagem"];
    $titulo = $_POST["titulo"];
    $texto = $_POST["texto"];
    $data = $_POST["data"];

    iduSQL("UPDATE imprensa SET imagem='$imagem', titulo='$titulo', texto='$texto', data='$data' WHERE id = '$_POST[id]'");
    $imprensa = selectSQLUnico("SELECT * FROM imprensa WHERE id = '$_POST[id]'");
}

$new = isset($_GET["new"]);
$new_input = isset($_POST["new"]) && isset($_POST["imagem"]) && isset($_POST["titulo"]) && isset($_POST["texto"]) && isset($_POST["data"]);
if($new_input){

    $imagem = $_POST["imagem"];
    $titulo = $_POST["titulo"];
    $texto = $_POST["texto"];
    $data = $_POST["data"];

    iduSQL("INSERT INTO imprensa (imagem, titulo, texto, data) VALUES ('$imagem', '$titulo', '$texto', '$data')");
    $imprensa = selectSQLUnico("SELECT * FROM imprensa ORDER BY id DESC");
}

$delete = isset($_GET["delete"]);
$delete_confirm = isset($_POST["delete"]);
if($delete){
    $imprensa = selectSQLUnico("SELECT * FROM imprensa WHERE id = '$_GET[delete]'");
}
if($delete_confirm){
    iduSQL("DELETE FROM imprensa WHERE id='$_POST[delete]'");
}
?>

<?php require("../componentes/header.php"); ?>

<main>
    <?php if(!$form && !$new && !$delete): ?>

    <div class="caixa">
        <h1>editar imprensa</h1>
        <hr>
        <table>
            <tr>
                <td>id</td>
                <td>imagem</td>
                <td>titulo</td>
                <td>texto</td>
                <td>Data Publicação</td>
                <td>acções</td>
            </tr>
            <?php foreach($imprensas as $i => $c): ?>
                <tr>
                    <td><?= $c["id"]?></td>
                    <td><img src="<?= $c["imagem"] ?>"></td>
                    <td><?= $c["titulo"] ?></td>
                    <td><?= concatenar($c["texto"]) ?></td>
                    <td><?= $c["data"] ?></td>
                    <td><a class="hover-green" href="imprensa.php?id=<?= $c["id"] ?>">Editar</a>|<a class="hover-red" href="imprensa.php?delete=<?= $c["id"] ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>    
        </table>
        <hr>
        <a href="imprensa.php?new=true"><button class="saber-mais">Nova imprensa</button></a>
        <hr>
    </div>

    <?php elseif($form && !$form_edit): ?>

    <div class="caixa">
        <h1>Editar imprensa - <?= $imprensa["titulo"] ?></h1>
        <hr>
        <form class="form_inputs" id="form1" method="post">
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            
            <label for="imagem">
                Imagem:
                <input type="text" name="imagem" id="imagem" value="<?= $imprensa["imagem"] ?>">
                <a onclick="window.open('../filemanager/tinyfilemanager.php','newwindow','width=700,height=500'); return false;" href="">
                    <button type="button">Procurar Imagem</button>
                </a>
            </label>

            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" value="<?= $imprensa["titulo"] ?>">

            <label for="texto">Texto:</label>
            <textarea name="texto" id="texto" value="<?= $imprensa["texto"] ?>" cols="30" rows="10">
                <?= $imprensa["texto"] ?>
            </textarea>

            <label for="data">data:</label>
            <input type="date" name="data" id="data" value="<?= $imprensa["data"] ?>">
        </form>
        <hr>
        <button class="saber-mais" type="submit" form="form1" value="Submit">Editar</button>
        <hr>
    </div>

    <?php elseif($form_edit): ?>

    <div class="caixa">
        <h3>imprensa editada com sucesso - <?= $imprensa["titulo"] ?></h3>
        <hr>
        <table>
            <tr>
                <td>id</td>
                <td>imagem</td>
                <td>titulo</td>
                <td>texto</td>
                <td>Data Publicação</td>
            </tr>
                <tr>
                    <td><?= $imprensa["id"]?></td>
                    <td><img src="<?= $imprensa["imagem"] ?>"></td>
                    <td><?= $imprensa["titulo"] ?></td>
                    <td><?= concatenar($imprensa["texto"]) ?></td>
                    <td><?= $imprensa["data"] ?></td>
                </tr>
        </table>
        <a href="imprensa.php"><button class="saber-mais">Voltar</button></a>
    </div>

    <?php elseif($new && !$new_input): ?>

    <div class="caixa">
        <h1>Nova imprensa</h1>
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
            <label for="titulo">Titulo:*</label>
            <input required="required" type="text" name="titulo" id="titulo">
            <label for="texto">Texto:*</label>
            <textarea name="texto" id="texto2" cols="30" rows="10">
            </textarea>
            <label for="data">data:</label>
            <input required="required" type="date" name="data" id="data">
        </form>
        <hr>
        <button class="saber-mais" type="submit" form="form1" value="Submit">Criar</button>
        <hr>
    </div>

    <?php elseif($new_input): ?>

    <div class="caixa">
        <h3>imprensa criada com sucesso - <?= $imprensa["titulo"] ?></h3>
        <hr>
        <table>
            <tr>
                <td>id</td>
                <td>imagem</td>
                <td>titulo</td>
                <td>texto</td>
                <td>data publicação</td>
            </tr>
                <tr>
                    <td><?= $imprensa["id"]?></td>
                    <td><img src="<?= $imprensa["imagem"] ?>"></td>
                    <td><?= $imprensa["titulo"] ?></td>
                    <td><?= concatenar($imprensa["texto"]) ?></td>
                    <td><?= $imprensa["data"] ?></td>
                </tr>
        </table>
        <a href="imprensa.php"><button class="saber-mais">Voltar</button></a>
    </div>

    <?php elseif($delete && !$delete_confirm): ?>

    <div class="caixa">
        <h3>Tem a certeza que pretende excluir esta imprensa? - <?= $imprensa["titulo"] ?></h3>
        <hr>
        <table>
            <tr>
                <td>id</td>
                <td>imagem</td>
                <td>titulo</td>
                <td>texto</td>
                <td>Data Publicação</td>
            </tr>
                <tr>
                    <td><?= $imprensa["id"]?></td>
                    <td><img src="<?= $imprensa["imagem"] ?>"></td>
                    <td><?= $imprensa["titulo"] ?></td>
                    <td><?= concatenar($imprensa["texto"]) ?></td>
                    <td><?= $imprensa["data"] ?></td>
                </tr>
        </table>
        <form id="form1" method="post">
            <input type="hidden" name="delete" value="<?= $_GET["delete"] ?>">
        </form>
        <hr>
        <button class="back-red saber-mais" type="submit" form="form1" value="Submit">Confirmar</button>
        <a href="imprensa.php"><button class="saber-mais">Voltar Atras</button></a>
        <hr>

    </div>

    <?php elseif($delete_confirm): ?>

        <div class="caixa">
        <h3>imprensa excluida com successo</h3>
        <hr>
        <a href="imprensa.php"><button class="saber-mais">Voltar Atras</button></a>
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