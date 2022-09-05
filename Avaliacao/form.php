<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Avaliação Trimestral </title>

    <style>

        body{
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

    </style>

</head>

<body>

    <form action="upload.php" method="post" enctype="multipart/form-data">

        <input type="file" name="arq" id="arq">
        <input type="submit" value="Enviar Arquivo" class="button">

    </form>
    
</body>

</html>