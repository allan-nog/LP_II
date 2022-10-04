<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aulamax5";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn -> connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE aulamax7";
if ($conn -> query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn -> error;
}

//////////////////////////////////////////////////////////////////////////

$sql = "CREATE TABLE `aulamax7`.`login` (
  id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(150) NOT NULL,
  email VARCHAR(250) NOT NULL,
  senha VARCHAR(100) NOT NULL
)";
  
if ($conn->query($sql) === TRUE) {
  echo "Table Login created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

//////////////////////////////////////////////////////////////////////////

$sql = "INSERT INTO `aulamax7`.`login`
VALUES ('1', 'Allan', 'Allan@gmail.com', 'Allan23')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//////////////////////////////////////////////////////////////////////////

$conn -> close();

?>