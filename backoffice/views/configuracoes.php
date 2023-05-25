<?php
require("../componentes/php_main.php");
$rota="configuracoes";

$form =  isset($_POST["senha_atual"]) && isset($_POST["nova_senha"]) && isset($_POST["confirmar_senha"]);

$result = isset($_GET["result"]);
$result_msg;

if($result){
    $result = $_GET["result"];
    switch($result){
        case 1: $result_msg = "senhas não coincidem!";
            break;
        case 2: $result_msg = "senha errada!";
            break;
        case 3: $result_msg = "senha alterada com sucesso!";
            break;
        default: false;
    }
}

if($form){
    $senha_atual = $_POST["senha_atual"];
    $nova_senha = $_POST["nova_senha"];
    $confirmar_senha = $_POST["confirmar_senha"];

    $corresponde = ($nova_senha == $confirmar_senha) ? true : false;
    if($corresponde){
        $user_pass = selectSQLUnico("SELECT * FROM admins WHERE id = $user[id]")["senha"];
        if(password_verify($senha_atual, $user_pass)){
            $nova_senha = password_hash($nova_senha, PASSWORD_DEFAULT);
            iduSQL("UPDATE admins SET senha='$nova_senha' WHERE id = $user[id]");
            header("Location: configuracoes.php?result=3");
        }
        else{
            header("Location: configuracoes.php?result=2");
        }
    }
    else{
        header("Location: configuracoes.php?result=1");
    }
}

?>
<?php require("../componentes/header.php"); ?>

<main>
    <div class="caixa">
        <h1>Alterar Palavra passe</h1>
        <hr>
        <?php if($result): ?>
            <h4 class="<?= ($result == 3) ? "back-green" : "back-red" ?>"><?= $result_msg ?></h4>
        <?php endif; ?>
        <form class="form_inputs" id="form1" method="post">
            <label for="senha_atual">Insira a sua senha atual:</label>
            <input type="password" name="senha_atual" required="required" id="senha_atual">
            <label for="nova_senha">Insira a sua nova senha:</label>
            <input type="password" required="required" name="nova_senha" id="nova_senha">
            <label for="confirmar_senha">Confirme a sua senha atual:</label>
            <input type="password" required="required" name="confirmar_senha" id="confirmar_senha">
            <p id="teste"></p>
        </form>
        <hr>
        <button class="saber-mais" id="botao_senha" type="submit" form="form1" value="Submit">Confirmar</button>
        <hr>
    </div>
</main>

<?php require("../componentes/footer.php") ?>
