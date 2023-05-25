<?php

require("../config/funcoes.php");

$form = isset($_POST["nome"]) && isset($_POST["senha"]);

if($form){
    if(logarCifra($_POST["nome"], $_POST["senha"])){
        header("Location: views/home.php");
    }
    else{
        session_destroy();
        header("Location: index.php?login=error");
        exit();
    }
}
else{
    header("Location:index.php");
    exit();
}

?>