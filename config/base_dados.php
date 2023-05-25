<?php

$pdo = new PDO("mysql:dbname=".$base_dados["dbname"].";host=".$base_dados["host"], $base_dados["user"], $base_dados["pass"]);

function iduSQL($sql){
    global $pdo;
    $pdo->query($sql);
}

function selectSQL($sql){
    global $pdo;
    $query = $pdo->query($sql);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function selectSQLUnico($sql){
    global $pdo;
    $query = $pdo->query($sql);
    return $query->fetch(PDO::FETCH_ASSOC);
}

function selectClass($sql, $classe){
    global $pdo;
    $query = $pdo->query($sql);
    return $query->fetch(PDO::FETCH_CLASS, $classe);
}

$contactos = selectSQLUnico("SELECT * FROM contactos");

$redes = selectSQLUnico("SELECT * FROM redes");

$carrosel = selectSQL("SELECT * FROM cabecalhos");

$lista_livros = selectSQL("SELECT * FROM livros");

$autor =selectSQLUnico("SELECT * FROM autor");

?>