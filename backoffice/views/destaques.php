<?php
require("../componentes/php_main.php");
$rota="destaques";

$destaques = selectSQL("SELECT destaques.id, livros.imagem, livros.titulo, destaques.tag FROM destaques INNER JOIN livros ON destaques.livro=livros.id ORDER BY destaques.id");
$error_msg = false;
$form = isset($_GET["id"]);

if($form){
    $destaques = selectSQLUnico("SELECT destaques.id, livros.imagem, livros.titulo, destaques.tag FROM livros INNER JOIN destaques ON livros.id=destaques.livro WHERE destaques.id = '$_GET[id]'");
    $livros = selectSQL("SELECT * FROM livros");
}

$form_edit = isset($_POST["id"]) && isset($_POST["livro"]) && isset($_POST["tag"]);
if($form_edit){

    $destaques = selectSQLUnico("SELECT * FROM destaques WHERE id = '$_POST[id]'");
    $livro = $_POST["livro"];
    $tag = $_POST["tag"];

    iduSQL("UPDATE destaques SET livro='$livro', tag='$tag' WHERE id = '$_POST[id]'");
    $destaques = selectSQLUnico("SELECT destaques.id, livros.imagem, livros.titulo, destaques.tag FROM livros INNER JOIN destaques ON livros.id=destaques.livro WHERE destaques.id = '$_POST[id]'");
}

$new = isset($_GET["new"]);
if($new){
     $livros = selectSQL("SELECT * FROM livros");
}
$new_input = isset($_POST["new"]) && isset($_POST["livro"]) && isset($_POST["tag"]);
if($new_input){
    if(count($destaques)<3){
        $livro = $_POST["livro"];
        $tag = $_POST["tag"];

        iduSQL("INSERT INTO destaques (livro, tag) VALUES ('$livro', '$tag')");
        $destaques = selectSQLUnico("SELECT destaques.id, livros.imagem, livros.titulo, destaques.tag FROM livros INNER JOIN destaques ON livros.id=destaques.livro ORDER BY id DESC");
    }
    else{
        $error_msg = true;
    }
}

$delete = isset($_GET["delete"]);
$delete_confirm = isset($_POST["delete"]);
if($delete){
    $destaques = selectSQLUnico("SELECT destaques.id, livros.imagem, livros.titulo, destaques.tag FROM livros INNER JOIN destaques ON livros.id=destaques.livro WHERE destaques.id = '$_GET[delete]'");
}
if($delete_confirm){
    iduSQL("DELETE FROM destaques WHERE id='$_POST[delete]'");
}
?>

<?php require("../componentes/header.php"); ?>

<main>
    <?php if($error_msg == true): ?>

    <div class="caixa">
        <h3>Já possui o limite de destaques</h3>
        <hr>
        <a href="destaques.php"><button class="saber-mais">Voltar Atras</button></a>
    <hr>

    <?php elseif(!$form && !$new && !$delete): ?>

    <div class="caixa">
        <h1>editar destaques</h1>
        <hr>
        <table>
            <tr>
                <td>imagem</td>
                <td>titulo</td>
                <td>tag</td>
                <td>acções</td>
            </tr>
            <?php foreach($destaques as $i => $c): ?>
                <tr>
                    <td><img src="<?= $c["imagem"] ?>"></td>
                    <td><?= $c["titulo"] ?></td>
                    <td><?= $c["tag"] ?></td>
                    <td><a class="hover-green" href="destaques.php?id=<?= $c["id"] ?>">Editar</a>|<a class="hover-red" href="destaques.php?delete=<?= $c["id"] ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>    
        </table>
        <hr>
        <?php if(count($destaques)<3): ?>
        <a href="destaques.php?new=true"><button class="saber-mais">Novo destaque</button></a>
        <hr>
        <?php endif; ?>
    </div>

    <?php elseif($form && !$form_edit): ?>

    <div class="caixa">
        <h1>Editar destaque - <?= $destaques["titulo"] ?></h1>
        <hr>
        <form class="form_inputs" id="form1" method="post">
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            
            <label for="livro">Livro:</label>
            <select name="livro" id="livro">
                <?php foreach($livros as $l): ?>
                    <option value="<?= $l["id"] ?>"><?= $l["titulo"] ?></option>
                <?php endforeach; ?>
            </select>

            <label for="tag">Tag:</label>
            <input type="text" name="tag" id="tag" value="<?= $destaques["tag"] ?>">
        </form>
        <hr>
        <button class="saber-mais" type="submit" form="form1" value="Submit">Editar</button>
        <hr>
    </div>

    <?php elseif($form_edit): ?>

    <div class="caixa">
        <h3>destaque editado com sucesso - <?= $destaques["titulo"] ?></h3>
        <hr>
        <table>
            <tr>
                <td>imagem</td>
                <td>titulo</td>
                <td>tag</td>
            </tr>
                <tr>
                    <td><img src="<?= $destaques["imagem"] ?>"></td>
                    <td><?= $destaques["titulo"] ?></td>
                    <td><?= $destaques["tag"] ?></td>
                </tr>
        </table>
        <a href="destaques.php"><button class="saber-mais">Voltar</button></a>
    </div>

    <?php elseif($new && !$new_input): ?>

    <div class="caixa">
        <h1>Novo destaque</h1>
        <hr>
        <form class="form_inputs" id="form1" method="post">
            <input type="hidden" name="new" value="<?= $_GET["new"] ?>">
            <label for="livro">Livro:</label>
            <select name="livro" id="livro">
                <?php foreach($livros as $l): ?>
                    <option value="<?= $l["id"] ?>"><?= $l["titulo"] ?></option>
                <?php endforeach; ?>
            </select>

            <label for="tag">Tag:</label>
            <input type="text" name="tag" id="tag">
        </form>
        <hr>
        <button class="saber-mais" type="submit" form="form1" value="Submit">Editar</button>
        <hr>
    </div>

    <?php elseif($new_input): ?>

    <div class="caixa">
        <h3>destaque criado com sucesso - <?= $destaques["titulo"] ?></h3>
        <hr>
        <table>
            <tr>
                <td>imagem</td>
                <td>titulo</td>
                <td>tag</td>
            </tr>
                <tr>
                    <td><img src="<?= $destaques["imagem"] ?>"></td>
                    <td><?= $destaques["titulo"] ?></td>
                    <td><?= $destaques["tag"] ?></td>
                </tr>
        </table>
        <a href="destaques.php"><button class="saber-mais">Voltar</button></a>
    </div>

    <?php elseif($delete && !$delete_confirm): ?>

    <div class="caixa">
        <h3>Tem a certeza que pretende excluir este destaques? - <?= $destaques["titulo"] ?></h3>
        <hr>
        <table>
            <tr>
                <td>imagem</td>
                <td>titulo</td>
                <td>tag</td>
            </tr>
                <tr>
                    <td><img src="<?= $destaques["imagem"] ?>"></td>
                    <td><?= $destaques["titulo"] ?></td>
                    <td><?= $destaques["tag"] ?></td>
                </tr>
        </table>
        <form id="form1" method="post">
            <input type="hidden" name="delete" value="<?= $_GET["delete"] ?>">
        </form>
        <hr>
        <button class="back-red saber-mais" type="submit" form="form1" value="Submit">Confirmar</button>
        <a href="destaques.php"><button class="saber-mais">Voltar Atras</button></a>
        <hr>
    </div>

    <?php elseif($delete_confirm): ?>

    <div class="caixa">
        <h3>destaque excluido com successo</h3>
        <hr>
        <a href="destaques.php"><button class="saber-mais">Voltar Atras</button></a>
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