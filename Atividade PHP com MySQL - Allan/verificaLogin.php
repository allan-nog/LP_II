<?php

    $login = $_POST["email"];
    $senha = $_POST["senha"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aulamax";    

    //Estabelece conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Verifica a conexão criada
    if ($conn -> connect_error){
        die("Falha ao conectar: ". $conn -> connect_error);
    }

    $stmt = $conn -> prepare("SELECT senha FROM usuarios where email=?");
    $stmt -> bind_param("s", $login);
    $stmt -> execute();

    $result = $stmt -> get_result();

    if ($result -> num_rows > 0) {
        //Output data of each row
        while ($row = $result -> fetch_assoc()) {
            if (password_verify($senha, $row['senha'])) {
                $stmt -> close();
                $conn -> close();

                session_start();
                $_SESSION["usuario"] = $login;
                $_SESSION["autenticado"] = true;

                header("Location: areaRestrita.php");
            } else {
                header("Location: login.php?erro=1");
            }
        }
    } else {
        header("Location: login.php?erro=1");
    }

    $stmt -> close();
    $conn -> close();   

?>