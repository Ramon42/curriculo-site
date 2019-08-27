<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Página principal</title>
  </head>
  <body class="back-photo">
    <header class="top_user_bar">
      <form id="align_search_bar" action="index.html" method="post">
        <div>
          <input type="text" name="buscar" required="false" placeholder="Buscar">
          <label for="buscar"><button type="submit" class="buttons_search" name="button"><i class="fas fa-search"></i></button></label>
          <a href="perfil.php" id="link_profile">
            <?php
              session_start();
              echo ("Usuário:" .$user[0]);
            ?>
          </a>
          <a href="login.php" id="link_profile">Logout</a>
        </div>
      </form>
      <a href="enviarFoto.php" class="buttons_large buttons_large-2">Enviar uma Foto</a>
    </header>
