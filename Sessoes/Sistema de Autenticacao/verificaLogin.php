<?php

    $login = $_POST["usuario"];
    $senha = $_POST["senha"];

    if ($login == "Allan" && $senha == "12345") {
        session_start();
        $_SESSION["usuario"] = $login;
        $_SESSION["autenticado"] = true;
        header("Location: areaRestrita.php");
    } else {
        header("Location: login.php?erro=1");
    }

?>