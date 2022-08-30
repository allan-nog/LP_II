<?php
    if (isset($_GET['arq'])) {

        $nomeArq = $_GET['arq'];

        unlink("imagens/". $nomeArq);

        echo $nomeArq. "Apagado com sucesso";

        header("location: areaRestrita2.php");

    }
    
?>