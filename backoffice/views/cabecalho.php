<?php
require("../componentes/php_main.php");
$rota="cabecalho";

$cabecalhos = selectSQL("SELECT * FROM cabecalhos");
$form = isset($_GET["id"]);

if($form){
    $banner = selectSQLUnico("SELECT * FROM cabecalhos WHERE id = '$_GET[id]'");
}

$form_edit = isset($_POST["id"]) && isset($_POST["img_desk"]) && isset($_POST["img_mobile"]) && isset($_POST["titulo"]) && isset($_POST["sub_titulo"]) && isset($_POST["link"]) && isset($_POST["tag"]);
if($form_edit){

    $banner = selectSQLUnico("SELECT * FROM cabecalhos WHERE id = '$_POST[id]'");
    $desktop = $_POST["img_desk"];
    $mobile = $_POST["img_mobile"];
    $titulo = $_POST["titulo"];
    $texto = $_POST["sub_titulo"];
    $link = $_POST["link"];
    $tag = $_POST["tag"];

    novaAtualizacao($_POST["id"]);

    iduSQL("UPDATE cabecalhos SET imagem='$desktop', imagem_mobile='$mobile', titulo='$titulo', sub_titulo='$texto', link='$link', tag ='$tag' WHERE id = '$_POST[id]'");
    $banner = selectSQLUnico("SELECT * FROM cabecalhos WHERE id = '$_POST[id]'");
}

$new = isset($_GET["new"]);
$new_input = isset($_POST["new"]) && isset($_POST["img_desk"]) && isset($_POST["img_mobile"]) && isset($_POST["titulo"]) && isset($_POST["sub_titulo"]) && isset($_POST["link"]) && isset($_POST["tag"]);
if($new_input){

    $desktop = $_POST["img_desk"];
    $mobile = $_POST["img_mobile"];
    $titulo = $_POST["titulo"];
    $texto = $_POST["sub_titulo"];
    $link = $_POST["link"];
    $tag = $_POST["tag"];

    iduSQL("INSERT INTO cabecalhos (imagem, imagem_mobile, titulo, sub_titulo, tag, link) VALUES ('$desktop', '$mobile', '$titulo', '$texto', '$tag', '$link')");
    $banner = selectSQLUnico("SELECT * FROM cabecalhos ORDER BY id DESC");
}

$delete = isset($_GET["delete"]);
$delete_confirm = isset($_POST["delete"]);
if($delete){
    $banner = selectSQLUnico("SELECT * FROM cabecalhos WHERE id = '$_GET[delete]'");
}
if($delete_confirm){
    iduSQL("DELETE FROM cabecalhos WHERE id='$_POST[delete]'");
}

?>

<?php require("../componentes/header.php"); ?>

<main>
    <?php if(!$form && !$new && !$delete): ?>

    <div class="caixa">
        <h1>editar Cabeçalhos</h1>
        <hr>
        <table>
            <tr>
                <td>id</td>
                <td>imagem</td>
                <td>titulo</td>
                <td>texto</td>
                <td>tag</td>
                <td>Data Atualização</td>
                <td>acções</td>
            </tr>
            <?php foreach($cabecalhos as $i => $c): ?>
                <tr>
                    <td><?= $c["id"]?></td>
                    <td><img src="<?= $c["imagem"] ?>"></td>
                    <td><?= $c["titulo"] ?></td>
                    <td><?= concatenar($c["sub_titulo"]) ?></td>
                    <td><?= $c["tag"] ?></td>
                    <td><?= $c["data_atualizacao"] ?></td>
                    <td><a class="hover-green" href="cabecalho.php?id=<?= $c["id"] ?>">Editar</a>|<a class="hover-red" href="cabecalho.php?delete=<?= $c["id"] ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>    
        </table>
        <hr>
        <a href="cabecalho.php?new=true"><button class="saber-mais">Novo Banner</button></a>
        <hr>
    </div>

    <?php elseif($form && !$form_edit): ?>

    <div class="caixa">
        <h1>Editar Cabeçalho - <?= $banner["titulo"] ?></h1>
        <hr>
        <form class="form_inputs" id="form1" method="post">
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            
            <label for="img_desk">
                Imagem Desktop:
                <input type="text" name="img_desk" id="img_desk" value="<?= $banner["imagem"] ?>">
                <a onclick="window.open('../filemanager/tinyfilemanager.php','newwindow','width=700,height=500'); return false;" href="">
                    <button type="button">Procurar Imagem</button>
                </a>
            </label>
            <label for="img_mobile">
                Imagem Mobile:
                <input type="text" name="img_mobile" id="img_mobile" value="<?= $banner["imagem_mobile"] ?>">
                <a onclick="window.open('../filemanager/tinyfilemanager.php','newwindow','width=700,height=500'); return false;" href="">
                    <button type="button">Procurar Imagem</button>
                </a>
            </label>

            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" value="<?= $banner["titulo"] ?>">
            <label for="sub_titulo">Texto:</label>
            <textarea name="sub_titulo" id="sub_titulo" value="" cols="30" rows="10">
                <?= $banner["sub_titulo"] ?>
            </textarea>
            <label for="tag">Tag:</label>
            <input type="text" name="tag" id="tag" value="<?= (!empty($banner['tag'])) ? $banner['tag'] : '' ?>"">
            <label for="link">Link:</label>
            <input type="text" name="link" id="link" value="<?= $banner["link"] ?>">
        </form>
        <hr>
        <button class="saber-mais" type="submit" form="form1" value="Submit">Editar</button>
        <hr>
    </div>

    <?php elseif($form_edit): ?>

    <div class="caixa">
        <h3>Cabeçalho editado com sucesso - <?= $banner["titulo"] ?></h3>
        <hr>
        <table>
            <tr>
                <td>id</td>
                <td>imagem</td>
                <td>titulo</td>
                <td>texto</td>
                <td>tag</td>
                <td>Data Atualização</td>
            </tr>
                <tr>
                    <td><?= $banner["id"]?></td>
                    <td><img src="<?= $banner["imagem"] ?>"></td>
                    <td><?= $banner["titulo"] ?></td>
                    <td><?= concatenar($banner["sub_titulo"]) ?></td>
                    <td><?= $banner["tag"] ?></td>
                    <td><?= $banner["data_atualizacao"] ?></td>
                </tr>
        </table>
        <a href="cabecalho.php"><button class="saber-mais">Voltar</button></a>
    </div>

    <?php elseif($new && !$new_input): ?>

    <div class="caixa">
        <h1>Novo Cabeçalho</h1>
        <hr>
        <form class="form_inputs" id="form1" method="post">
            <input required="required" type="hidden" name="new" value="<?= $_GET["new"] ?>">
            <label for="img_desk">
                Imagem Desktop:
                <input type="text" name="img_desk" id="img_desk">
                <a onclick="window.open('../filemanager/tinyfilemanager.php','newwindow','width=700,height=500'); return false;" href="">
                    <button type="button">Procurar Imagem</button>
                </a>
            </label>
            <label for="img_mobile">
                Imagem Mobile:
                <input type="text" name="img_mobile" id="img_mobile">
                <a onclick="window.open('../filemanager/tinyfilemanager.php','newwindow','width=700,height=500'); return false;" href="">
                    <button type="button">Procurar Imagem</button>
                </a>
            </label>
            <label for="titulo">Titulo:*</label>
            <input required="required" type="text" name="titulo" id="titulo">
            <label for="sub_titulo">Texto:*</label>
            <textarea name="sub_titulo" id="sub_titulo2" cols="30" rows="10">
            </textarea>
            <label for="tag">Tag:</label>
            <input type="text" name="tag" id="tag">
            <label for="link">Link:*</label>
            <input required="required" type="text" name="link" id="link">
        </form>
        <hr>
        <button class="saber-mais" type="submit" form="form1" value="Submit">Criar</button>
        <hr>
    </div>

    <?php elseif($new_input): ?>

    <div class="caixa">
        <h3>Cabeçalho criado com sucesso - <?= $banner["titulo"] ?></h3>
        <hr>
        <table>
            <tr>
                <td>id</td>
                <td>imagem</td>
                <td>titulo</td>
                <td>texto</td>
                <td>tag</td>
            </tr>
                <tr>
                    <td><?= $banner["id"]?></td>
                    <td><img src="<?= $banner["imagem"] ?>"></td>
                    <td><?= $banner["titulo"] ?></td>
                    <td><?= concatenar($banner["sub_titulo"]) ?></td>
                    <td><?= $banner["tag"] ?></td>
                </tr>
        </table>
        <a href="cabecalho.php"><button class="saber-mais">Voltar</button></a>
    </div>

    <?php elseif($delete && !$delete_confirm): ?>

    <div class="caixa">
        <h3>Tem a certeza que pretende excluir este banner? - <?= $banner["titulo"] ?></h3>
        <hr>
        <table>
            <tr>
                <td>id</td>
                <td>imagem</td>
                <td>titulo</td>
                <td>texto</td>
                <td>tag</td>
                <td>Data Atualização</td>
            </tr>
                <tr>
                    <td><?= $banner["id"]?></td>
                    <td><img src="<?= $banner["imagem"] ?>"></td>
                    <td><?= $banner["titulo"] ?></td>
                    <td><?= concatenar($banner["sub_titulo"]) ?></td>
                    <td><?= $banner["tag"] ?></td>
                    <td><?= $banner["data_atualizacao"] ?></td>
                </tr>
        </table>
        <form id="form1" method="post">
            <input type="hidden" name="delete" value="<?= $_GET["delete"] ?>">
        </form>
        <hr>
        <button class="back-red saber-mais" type="submit" form="form1" value="Submit">Confirmar</button>
        <a href="cabecalho.php"><button class="saber-mais">Voltar Atras</button></a>
        <hr>

    </div>

    <?php elseif($delete_confirm): ?>

        <div class="caixa">
        <h3> Banner excluido com successo</h3>
        <hr>
        <a href="cabecalho.php"><button class="saber-mais">Voltar Atras</button></a>
        <hr>

    </div>

    <?php endif; ?>
</main>

<script>
    ClassicEditor
        .create( document.querySelector( '#sub_titulo' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#sub_titulo2' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<?php require("../componentes/footer.php") ?>