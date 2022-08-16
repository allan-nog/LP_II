<!DOCTYPE html>  
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Validação de Formulário </title>

<style>

    body{
        font-family: 'Poppins', sans-serif;
    }

    input[type="submit"]{
        margin-top: 10px;
        display: block;
        border: none;
        outline: none;
        background-color: dodgerblue;
        color: #FFF;
        padding: 8px 20px;
        border-radius: 15px;
    }

    label{
        display: block;
        margin-top: 20px;
    }

    fieldset{ border-color: #FF0000; }
    legend{ color: #FF0000; }
    .error { color: #FF0000; }

</style>

</head>

<body>  

    <?php
    
    // define variáveis ​​e configura valores vazios
    $nameErr = $emailErr = $genderErr = $websiteErr = $ipErr = $macErr = $termsErr = "";
    $name = $email = $gender = $comment = $website = $ip = $mac = $terms = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "O Nome é obrigatório";
        } else {
            $name = test_input($_POST["name"]);

            // verifica se o nome contém apenas letras e espaços em branco
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameErr = "Apenas letras e espaços em branco são permitidos";
            }
        }
        
        if (empty($_POST["email"])) {
            $emailErr = "O Email é obrigatório";
        } else {
            $email = test_input($_POST["email"]);
            // verifica se o endereço de e-mail está bem formatado
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de email inválido";
            }
        }
            
        if (empty($_POST["website"])) {
            $website = "";
        } else {
            $website = test_input($_POST["website"]);
            // verifica se a sintaxe do endereço da URL é válida (essa expressão regular também permite traços na URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
            $websiteErr = "URL inválida";  
            }
        }

        if (empty($_POST["comment"])) {
            $comment = "";
        } else {
            $comment = test_input($_POST["comment"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "O sexo é obrigatório";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        if (empty($_POST["ip"])) {
            $ipErr = "O Endereço IP é obrigatório";
        } else {
            $ip = test_input($_POST["ip"]);
            // verifica se o endereço IP está bem formatado
            if (!filter_var($ip, FILTER_VALIDATE_IP)) {
                $ipErr = "Formato de Endereço IP inválido";
            }
        }

        if (empty($_POST["mac"])) {
            $macErr = "O Endereço MAC é obrigatório";
        } else {
            $mac = test_input($_POST["mac"]);
            // verifica se o endereço MAC está bem formatado
            if (!filter_var($mac, FILTER_VALIDATE_MAC)) {
                $macErrErr = "Formato de Endereço MAC inválido";
            }
        }

        if (empty($_POST["terms"])) {
            $termsErr = "Os Termos de serviço é obrigatório";
        } else {
            $terms = test_input($_POST["terms"]);
        }

    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>

    <h2> PHP Form Validation Example </h2>

    <p> <span class="error"> * required field </span> </p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <fieldset>
        <legend> Allan Pinto Nogueira </legend>

        <label for="name"> Name: </label>
        <input type="text" id="name" name="name" value="<?php echo $name;?>" required>
        <span class="error"> * <?php echo $nameErr;?> </span>

        <label for="email"> E-mail: </label>
        <input type="text" id="email" name="email" value="<?php echo $email;?>" required>
        <span class="error"> * <?php echo $emailErr;?> </span>

        <label for="website"> Website: </label>
        <input type="text" id="website" name="website" value="<?php echo $website;?>">
        <span class="error"> <?php echo $websiteErr;?> </span>

        <label for="comment"> Comment:  </label>
        <textarea id="comment" name="comment" rows="5" cols="40"> <?php echo $comment;?> </textarea>

        <label> Gender: </label>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"> Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other"> Other  
        <span class="error"> * <?php echo $genderErr;?> </span>

        <label for="ip"> Endereço IP: </label>
        <input type="text" name="ip" id="ip" value="<?php echo $ip;?>" required>
        <span class="error"> * <?php echo $ipErr;?> </span>

        <label for="ip"> Endereço MAC: </label>
        <input type="text" name="mac" id="mac" value="<?php echo $mac;?>" required>
        <span class="error"> * <?php echo $macErr;?> </span>

        <label for="terms"> Agree to Terms of Service: </label>
        <input type="checkbox" name="terms" id="terms" value="<?php echo $terms;?>" required>
        <span class="error"> * <?php echo $termsErr;?> </span>

        <input type="submit" name="submit" value="Submit" required>

        </fieldset>

    </form>

    <?php
        echo "<h2>Your Input:</h2>";
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $website;
        echo "<br>";
        echo $comment;
        echo "<br>";
        echo $gender;
        echo "<br>";
        echo $ip;
        echo "<br>";
        echo $mac;
        echo "<br>";
        echo $terms;
    ?>

</body>

</html>