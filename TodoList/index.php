<?php

    session_start();
    if (!isset($_SESSION["autenticado"]) || !isset($_SESSION["usuario"])){
        header("Location: Login/login.html?erro=2");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title> Todo List </title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>

  </head>

  <body>

    <div class="container">

      <form action="inserirTarefa.php" method="post">

        <div class="input-field">
          <img src="bars-icon.svg" alt="icon">
            <input type="text" placeholder="Adicionar uma nova tarefa" name="task-description">
          <i class="uil uil-notes note-icon"></i>
        </div>

        <div class="prazo">
          <label for="prazo"> Prazo: </label>
          <input type="date" name="prazo" id="prazo">
          <!-- <input type="submit" value="Enviar" class="button"> -->
        </div>

      </form>

      <div class="controls">
        <div class="filters">
          <span class="active" id="all"> Tudo </span>
          <span id="pending"> Pendente </span>
          <span id="completed"> Concluído </span>
        </div>
      </div>

      <ul class="todoLists"></ul>

      <div class="pending-tasks">
        <button class="clear-button"> Limpar Tudo </button>
      </div>
    </div>

    <script src="script.js"></script>

  </body>
</html>
