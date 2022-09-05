<?php
$target_dir = "./uploads/";
$target_file = $target_dir . basename($_FILES["arq"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file)) {
  echo "O arquivo já existe no servidor.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo " Desculpe, seu arquivo não foi carregado.";
} else {
  if (move_uploaded_file($_FILES["arq"]["tmp_name"], $target_file)) {
    echo "O arquivo ". htmlspecialchars( basename( $_FILES["arq"]["name"])). " foi enviado com sucesso.";
  } else {
    echo "Desculpe, ocorreu um erro ao enviar seu arquivo.";
  }
}

$myfile = fopen("log.txt", "a");

$myfile = fopen("log.txt", "a") or die("Unable to open file!");

date_default_timezone_set('America/Sao_Paulo');
$hora = date("d/m/Y H:i:s");
$enderecoIp = " [". $_SERVER['REMOTE_ADDR']. "]";

fwrite($myfile, $hora);
fwrite($myfile, $enderecoIp);
fwrite($myfile, " - ". $target_dir. htmlspecialchars( basename( $_FILES["arq"]["name"])). "\n");

fclose($myfile);

?>