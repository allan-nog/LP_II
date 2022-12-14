<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "provatrimestral";

    
    if (isset($_POST["enviar"])){

        $conn = new mysqli($servername, $username, $password, $dbname);// Check connection
        if ($conn -> connect_error) {
            die("Connection failed: " . $conn -> connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO clientes (nome, telefone, endereco, veiculo) VALUES(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $tel, $endereco, $veiculo);
        
        $nome = $_POST["name"];
        $tel = $_POST["tel"];
        $endereco = $_POST["address"];
        $veiculo = $_POST["car"];
        $stmt -> execute();
    
        echo "New records created successfully";

        $stmt -> close();
        $conn -> close();

    } else {
        echo "Valores não recebidos.";
    }

?>