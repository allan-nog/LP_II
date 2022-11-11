<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aulamax";

    
    if (isset($_POST["enviar"])){

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES(?, ?, ?)");
        $stmt->bind_param("sss", $nome, $email, $senha);
        
        // set parameters and execute
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
        $stmt->execute();
    
        echo "New records created successfully";

        $stmt->close();
        $conn->close();
    } else {
        echo "Valores não recebidos.";
    }

?>