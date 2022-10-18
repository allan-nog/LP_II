<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aulamax1";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE aulamax1";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Database created successfully <br>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

//////////////////////////////////////////////////////////////////////////

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to create table
  $sql = "CREATE TABLE `aulamax1`.`login` (
    id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(250) NOT NULL,
    senha VARCHAR(100) NOT NULL
  )";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Table created successfully <br>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

//////////////////////////////////////////////////////////////////////////

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   $sql = "INSERT INTO `aulamax1`.`login`
//   VALUES ('1', 'Allan', 'Allan@gmail.com', 'Allan23')";
//   // use exec() because no results are returned
//   $conn->exec($sql);
//   echo "New record created successfully";
// } catch(PDOException $e) {
//   echo $sql . "<br>" . $e->getMessage();
// }

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO login (id, nome, email, senha)
  VALUES (:id, :nome, :email, :senha)");
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':senha', $senha);

  // insert a row
  // $id = "John";
  $nome = "Doe";
  $email = "john@example.com";
  $senha = "1234";
  $stmt->execute();

  // insert another row
  // $id = "Mary";
  $nome = "Moe";
  $email = "mary@example.com";
  $senha = "1234";
  $stmt->execute();

  // insert another row
  // $id = "Julie";
  $nome = "Dooley";
  $email = "julie@example.com";
  $senha = "1234";
  $stmt->execute();

  echo "New records created successfully";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

//////////////////////////////////////////////////////////////////////////

$conn = null;

?>

