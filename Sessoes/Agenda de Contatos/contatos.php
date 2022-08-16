<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Agenda de Contatos </title>

    <style>

        body {
            font-family: 'Poppins', sans-serif;
        }

        .button{
            padding: 10px 30px;
            background-color: dodgerblue;
            color: white;
            font-size: 16px;
            outline: none;
            border: none;
            border-radius: 20px;
            display: block;
            margin: 10px 0;
        }

        label{
            display: block;
        }

    </style>

</head>

<body>

    <h3> Agenda de Contatos </h3>

    <?php
        session_start();
        if (isset($_SESSION["contatos"])){
            $contatos = $_SESSION["contatos"];
            echo "<ol>";
            foreach ($contatos as $contato) {
                echo "<li> Nome: ". $contato[0]. "<br> Telefone: ". $contato[1];
            }
            echo "</ol>";
        }
    ?>

    <p> Incluir novo contato na lista: </p>
    
    <form action="adicionar.php" method="post">
        <label for="nome"> Nome: </label>
        <input type="text" name="nome" id="nome">

        <label for="telefone"> Telefone: </label>
        <input type="text" name="telefone" id="telefone">

        <input type="submit" value="Adicionar" class="button">
    </form>
    
</body>

</html>