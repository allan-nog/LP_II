<!DOCTYPE html>
<?php

    session_start();
    if (!isset($_SESSION["autenticado"]) || !isset($_SESSION["usuario"])){
        header("Location: login.php?erro=2");
    }

?>


<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title> Area Restrita </title>

    <style>

        a{
            text-decoration: underline;
            cursor: pointer;
        }

    </style>

</head>

<body class="w3-light-grey">

    <!-- <p>
        <?php
            echo "Olá ". $_SESSION["usuario"]. "! Seja bem vindo!";
        ?>
        <a href="logoff.php"> [Sair] </a>
    </p> -->

    <!-- Top container -->
    <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> Menu </button>
    <a href="logoff.php" class="w3-bar-item w3-right"> Sair </a>
    </div>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s4">
        <img src="imagens/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
        </div>
        <div class="w3-col s8 w3-bar">
        <span> Welcome, <strong> <?php echo $_SESSION["usuario"]; ?> </strong> </span> <br>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
        </div>
    </div>
    <hr>
    <div class="w3-container">
        <h5>Dashboard</h5>
    </div>
    <div class="w3-bar-block">
        <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
        <a href="areaRestrita.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i> Principal </a>
        <a href="areaRestrita2.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-eye fa-fw"></i> Album de Fotos </a>
    </div>
    </nav>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

   

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

    <!-- End page content -->
    </div>

    <script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
    }

    // Close the sidebar with the close button
    function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
    }
    </script>
    
</body>

</html>