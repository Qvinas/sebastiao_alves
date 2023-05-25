<?php

require_once("../../config/config.php");
require_once("../../config/base_dados.php");
require_once("../../config/funcoes.php");

session_start();
$user = $_SESSION["user"];
if(empty($_SESSION["user"])){
    header("Location: ../index.php");
    exit();
}

?>