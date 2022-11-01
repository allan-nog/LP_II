<?php

    $senha = "Allan123";

    $hasw = password_hash($senha, PASSWORD_DEFAULT);

    echo $hasw;
    // echo password_verify($senha, $hasw);
?>