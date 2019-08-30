<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title></title>
  </head>

  <body class="back-photo">

    <?php
    require_once "../banco.php";
    require_once "util.php";
    session_start();
    $descricao = fromPost("descricao");
    $local = fromPost("local");
    $user = $_SESSION["autenticado"];
    if (!isset($user)){
        header("Location: login.php");
        exit();
    }
    if(empty($descricao)){
      $descricao = " ";
    }
    if(empty($local)){
      $local = "não identificado";
    }

    if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {

        $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
        $nome = $_FILES[ 'arquivo' ][ 'name' ];

        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        $extensao = strtolower ( $extensao );
        if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            $novoNome = uniqid ( time () ) . '.' . $extensao;

            // Concatena a pasta com o nome
            $path = "../users/".$user[2]."/uploads/";
            $destino = "../users/".$user[2]."/uploads/".$novoNome;
            if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
              setcookie('descricao_temp', $descricao, time()+60*60*7, "/");
              setcookie('local_temp', $local, time()+60*60*7, "/");
              setcookie('path_temp', $destino, time()+60*60*7, "/");
              header("location: ../nav.php?page=img_preview");
            }
        }
      }
    ?>

  </body>
</html>
