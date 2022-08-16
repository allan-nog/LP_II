<!DOCTYPE html>
<?php

    session_start();
    if (!isset($_SESSION["autenticado"]) || !isset($_SESSION["usuario"])){
        header("Location: login.php?erro=2");
    }

?>


<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Area Restrita </title>

</head>

<body>

    <p>
        <?php
            echo "Olá ". $_SESSION["usuario"]. "! Seja bem vindo!";
        ?>
        <a href="logoff.php"> [Sair] </a>
    </p>
    
</body>

</html>