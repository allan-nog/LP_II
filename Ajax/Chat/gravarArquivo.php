<?php

    $msg = $_POST["msg"];
    $qtdMensagens = $_POST["qtdMensagens"];
    $hora = date("H:i");

    if (isset ($_POST["msg"])){
        if ($_POST["msg"] != ""){
            if ($_POST["name"] != ""){
                $name = $_POST["name"];
            } else {
                $name = "Sem Nome";
            }
            $fp = fopen("mensagens.txt", "a");
            
            $c = 0;
            while ($c <= $qtdMensagens) {
                fwrite($fp, "<div class='messages'> <p class='username'>". $name. "</p>". "<p class='mensagem'>". $_POST["msg"]. "<span>". $hora. "</span>". "</p>". "</div> \n");
                $c++;
            }

            fclose($fp);
        }
    }

?>