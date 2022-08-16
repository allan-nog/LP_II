<?php

    session_start();
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];

    if (!isset($_SESSION["contatos"])){
        $contatos = array();
    } else {
        $contatos = $_SESSION["contatos"];
    }

    $contato[0] = $nome;
    $contato[1] = $telefone;

    array_push($contatos, $contato);
    $_SESSION["contatos"] = $contatos;
    header("Location: contatos.php");

?>