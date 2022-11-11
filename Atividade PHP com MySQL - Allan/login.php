<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title> Sistema de Autenticacao </title>

    <style>

        body {
            font-family: 'Poppins', sans-serif;
        }
        .erro{
            color: red;
        }

    </style>

</head>

<body onload="document.getElementById('id01').style.display='block'">

    <div class="w3-container">

    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large"> Login </button>

        <div id="id01" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        
            <div class="w3-center"> <br>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                <img src="imagens-avatar/avatar2.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
            </div>

            <form action="verificaLogin.php" method="POST" class="w3-container">

                <div class="w3-section">
                <p class="erro">
                <?php
                    if (isset($_GET["erro"])){
                        if ($_GET["erro"] == 1){
                            echo "Login e Senha inválidos";
                        }
                        if ($_GET["erro"] == 2){
                            echo "Efetue o login para acessar a página";
                        }
                    }
                ?>
            </p>
                <label for="email"> <b>Username</b> </label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="email" id="email" required>
                
                <label for="senha"> <b>Password</b> </label>
                <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="senha" id="senha" required>
                
                <input type="submit" name="enviar" value="Login" class="w3-button w3-block w3-green w3-section w3-padding">

                <input class="w3-check w3-margin-top" type="checkbox" checked="checked" name="lembrar" value="S"> Remember me
                
            </div>

            </form>

            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                <span class="w3-right w3-padding w3-hide-small"> Esqueceu a <a href="#"> senha? </a></span>
            </div>

            </div>
        </div>
    </div>
    
</body>


</html>