<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha)
    VALUES (:nome, :email, :senha)");
    $stmt->bindParam(':nome', $_POST["name"]);
    $stmt->bindParam(':email', $_POST["createEmail"]);
    $stmt->bindParam(':senha', $_POST["createPassword"]);

    $nome = $_POST["name"];
    $email = $_POST["createEmail"];
    $senha = password_hash($_POST["createPassword"], PASSWORD_DEFAULT);
    $stmt->execute();

    echo "New records created successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

?>