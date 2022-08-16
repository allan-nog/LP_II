<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Formulário HTML </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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

        i{
            color: red;
        }

    </style>

</head>

<body>

    <h1 class="w3-container w3-teal"> Summer Holiday </h1>

    <?php

        if (isset($_POST['btnEnvio'])){
                
            //echo $_FILES['arq1']['name'];
            $name = $_FILES['arq1']['name'];
            echo "<br><br>";
            
            //echo $_FILES['arq1']['size'];
            $fileSize = $_FILES['arq1']['size'];
            echo "<br><br>";
            
            //echo $_FILES['arq1']['tmp_name'];	
            $tmpName = $_FILES['arq1']['tmp_name'];
            echo "<br><br>";
            
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            echo "<br><br>";
            
            $allowedExtensions = ['gif', 'pdf', 'png', 'jpg'];

            if (in_array($ext, $allowedExtensions) ){
                if (!file_exists("./files/".$name) ){
                    move_uploaded_file($tmpName, "./files/".$name);
                } else{
                    echo "Arquivo já existe no servidor!";
                }
            } else{
                echo "Extensão de arquivo não permitida!!";
            }
            
        }

    ?>

    <form action="formUpload.php" method="POST" enctype="multipart/form-data">

        <input type="file" name="arq1">
        <input type="submit" name="btnEnvio" value="Enviar" class="button">

    </form>

    <?php

        $files = scandir("./files/");
        $onlyImages = ['gif', 'jpg', 'png', 'jpeg', 'svg'];
            
        for($i = 2; $i < sizeof($files) ; $i++) {
            $ext = pathinfo($files[$i], PATHINFO_EXTENSION);

            if (in_array($ext, $onlyImages)){
                echo "<img src='./files/$files[$i]' height='150'/> <a href='apagar.php?arq=$files[$i]'><i class='fa-solid fa-trash-can'></i></a> <br />";
            }

        }

    ?>

</body>

</html>