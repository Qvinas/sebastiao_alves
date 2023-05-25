<?php

require_once("../config/config.php");
require_once("../config/base_dados.php");
require_once("../config/funcoes.php");

session_start();

if(!empty($_SESSION["user"])){
    header("Location: views/home.php");
}
?>
        <?php require("componentes/header_index.php") ?>
        <main>
            <div class="caixa">
                <h3> Fazer Login </h3>
                <hr>
                <?php if(isset($_GET["login"]) == "error"): ?>
                    <h4 class="error">
                        Login Inválido, tente novamente.
                    </h4>
                <?php endif; ?>
                <form id="form1" action="login.php" method="post">
                    <label for="login">Login:</label>
                    <input type="text" id="login" name="nome" required="required">
                    <label for="senha">Password:</label>
                    <input type="password" id="senha" name="senha" required="required">
                </form>
                <hr>
                <button class="saber-mais" type="submit" form="form1" value="Submit">Entrar</button>
                <hr>
            </div>
        </main>
        <?php require("componentes/footer.php") ?>
