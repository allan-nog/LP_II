<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Sistema de Autenticacao </title>

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

    <form action="verificaLogin.php" method="POST">

        <label for="usuario"> Usuário: </label>
        <input type="text" name="usuario" id="usuario">

        <label for="senha"> Senha: </label>
        <input type="password" name="senha" id="senha"> <br>

        <input type="checkbox" name="lembrar" value="S"> Lembrar Senha

        <input type="submit" value="Efetuar Login" class="button">
 
    </form>
    
</body>


</html>