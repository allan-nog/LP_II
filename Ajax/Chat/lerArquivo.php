<?php

    $arquivoDados = fopen("mensagens.txt", "r") or die ("Não foi possível abrir o arquivo!");

    //Lê o arquivo linha a linha
    while(!feof($arquivoDados)){
        echo fgets($arquivoDados) . "<br>";
    }

    fclose($arquivoDados);

?>