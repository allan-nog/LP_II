<?php

    //Checa se o parametro msg foi enviado por GET
    if (isset ($_GET["msg"])){
        $enderecoIp = " [". $_SERVER['REMOTE_ADDR']. "]";
        $fp = fopen("mensagens.txt", "a");
        fwrite($fp, $enderecoIp. " - Enviou: ". $_GET["msg"]. "\n");
        fclose($fp);
    }

?>