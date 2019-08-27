<?php
  require_once 'bootstrap.php';
  $page = "home";
  if (isset($_GET['page']))
    $page = fromGet('page');
  $file = "pages/$page.php";
?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Página principal</title>
  </head>
  <body class="back-photo">
    <main class="mainSession">
      <?php
        session_start();
        $user = $_SESSION["autenticado"];
        if (file_exists($file))
          include $file;
        else
          include "404.php";
      ?>
    </main>
    <?php include 'pages/footer.php';?>
  </body>
</html>
