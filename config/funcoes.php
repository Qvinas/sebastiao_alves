<?php

require_once("config.php");
require_once("base_dados.php");

function logarCifra($login, $senha){
    date_default_timezone_set("Europe/Lisbon");
    
    $individuo = selectSQLUnico("SELECT * FROM admins WHERE login='$login'");
    if(!empty($individuo)){
        if(password_verify($senha, $individuo["senha"])){
            session_start();
            $_SESSION["user"] = $individuo;
            unset($_SESSION["user"]->senha);
            
            $id = $individuo["id"];
            novaAcesso($id);

            return true;
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
}

function novaAcesso($id_user){

    date_default_timezone_set("Europe/lisbon");
    $data_atual = date("H:i:s - d/m/Y");
    iduSQL ("INSERT INTO acessos (data, id_user) VALUES ('$data_atual', '$id_user')");

}

function novaAtualizacao($id_user){

    date_default_timezone_set("Europe/lisbon");
    $data_atual = date("H:i:s - d/m/Y");
    iduSQL("UPDATE cabecalhos SET data_atualizacao='$data_atual' WHERE id='$id_user'");

}

function novaAtualizacaoLivros($id_user){

    date_default_timezone_set("Europe/lisbon");
    $data_atual = date("H:i:s - d/m/Y");
    iduSQL("UPDATE livros SET ultima_atualizacao='$data_atual' WHERE id='$id_user'");

}
  
function headerText($rota, $livro=""){

    switch($rota){
        case "autor": return "<h1 class='menu'>$rota</h1> <h1> Sobre mim </h1>";
        case "livros": return "<h1 class='menu'>$rota</h1> <h1> $livro </h1>";
        case "imprensa": return "<h1 class='menu'>$rota</h1> <h1>Últimas Noticias</h1>";
        case "contactos": return "<h1 class='menu'>$rota</h1> <h1>pode contactar-me através do e-mail ou telefone</h1>";
    }

}

function concatenar($t, $n="40"){
    if(strlen($t) > $n){
        $t = substr($t, 0, $n) . "...</p>";
    }
    return $t;
}

function dataNova($data) {
    $timestamp = strtotime($data);
  
    $dia = date("j", $timestamp);
    $mes = date("n", $timestamp);
    $ano = date("Y", $timestamp);
  
    $meses = array(
      1 => 'Janeiro',
      2 => 'Fevereiro',
      3 => 'Março',
      4 => 'Abril',
      5 => 'Maio',
      6 => 'Junho',
      7 => 'Julho',
      8 => 'Agosto',
      9 => 'Setembro',
      10 => 'Outubro',
      11 => 'Novembro',
      12 => 'Dezembro'
    );
    $mes = $meses[$mes];
  
    $nova_data = "Publicado a $dia de $mes de $ano";
  
    return $nova_data;
  }


?>
