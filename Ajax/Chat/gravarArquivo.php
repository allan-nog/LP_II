<?php

    $msg = $_POST["msg"];

    if (isset ($_POST["msg"])){
        if ($_POST["msg"] != ""){
            if ($_POST["name"] != ""){
                $name = $_POST["name"];
            } else {
                $name = "Sem Nome";
            }
            $fp = fopen("mensagens.txt", "a");
            fwrite($fp, $name. " - Enviou: ". $_POST["msg"]. "\n");
            fclose($fp);
        }
    }

?>