<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Photo Album </title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <style>

        body {
            font-family: 'Poppins', sans-serif;
        }

        form{
            margin: 10px 0 0 20px;
        }

        p{
            font-size: 18px;
        }

        img {
            width: 100%;
        }

        i {
            color: #009688;
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

        .w3-third {
            margin-bottom: 20px;
        }

    </style>

</head>

<body>

    <div class="w3-container w3-teal">
        <h1>Summer Holiday</h1>
    </div>

    <form action="photoAlbum.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="arq1">
        <input type="submit" name="btnEnvio" value="Enviar" class="button">
    </form>

    <?php

        if (isset($_POST['btnEnvio'])){
                
            $name = $_FILES['arq1']['name'];
            
            $fileSize = $_FILES['arq1']['size'];
            
            $tmpName = $_FILES['arq1']['tmp_name'];
            
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            
            $allowedExtensions = ['gif', 'pdf', 'png', 'jpg'];

            if (in_array($ext, $allowedExtensions) ){
                if (!file_exists("./imagens/".$name) ){
                    move_uploaded_file($tmpName, "./imagens/".$name);
                } else{
                    echo "Arquivo já existe no servidor!";
                }
            } else{
                echo "Extensão de arquivo não permitida!!";
            }
            
        }

    ?>

    <?php

    $files = scandir("./imagens/");

    $controle = 1;

    echo "<div class=\"w3-row-padding w3-margin-top\">";

    for ($i = 2; $i < sizeof($files); $i++) {

        if ($controle <= 3) {
            echo "
                <div class='w3-third'>
                    <div class='w3-card'>
                        <img src='imagens/$files[$i]'>
                        <div class='w3-container'>
                            <p> $files[$i] <a href='apagar.php?arq=$files[$i]'><i class='fa-solid fa-trash-can'></i> </a> </p>
                        </div>
                    </div>
                </div>";

            $controle = $controle + 1;
        } else {
            // echo "</div
            //       <div class='w3-row-padding w3-margin-top'>";

            echo "
                <div class='w3-third'>
                    <div class='w3-card'>
                        <img src='imagens/$files[$i]'>
                        <div class='w3-container'>
                            <p> $files[$i] <a href='apagar.php?arq=$files[$i]'><i class='fa-solid fa-trash-can'></i></a> </p>
                        </div>
                    </div>
                </div>";

            $controle = 2;
        }

    }

    echo "</div>";

    ?>

    

</body>

</html>