<?php

    //Checa se o parametro msg foi enviado por GET
    if (isset ($_GET["msg"])){
        if ($_GET["msg"] != ""){
            if ($_GET["name"] != ""){
                $name = $_GET["name"];
            } else {
                $name = "Sem Nome";
            }
            $fp = fopen("mensagens.txt", "a");
            fwrite($fp, $name. " - Enviou: ". $_GET["msg"]. "\n");
            fclose($fp);
        }
        
    }

?>