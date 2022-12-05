<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sistema";
    
    if (isset($_POST["task-description"])){

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);// Check connection
        if ($conn -> connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // prepare and bind
        $stmt = $conn -> prepare("INSERT INTO tarefas (tarefa) VALUES(?)");
        $stmt -> bind_param("s", $tarefa);
        
        // set parameters and execute
        $tarefa = $_POST["task-description"];
        $stmt -> execute();
    
        echo "New records created successfully";

        $stmt -> close();
        $conn -> close();

        header("Location: index.php");
    } else {
        echo "Valores não recebidos.";
    }

?>