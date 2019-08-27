<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            $destino = "../users/".$user[2]."/uploads/".$novoNome;
            if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
              setcookie('descricao_temp', $descricao, time()+60*60*7);
              setcookie('local_temp', $local, time()+60*60*7);
              setcookie('path_temp', $destino, time()+60*60*7);
              echo ("<form method='post' enctype='multipart/form-data' action='uploadImg.php'>");
              echo ("<div class='main_pub'>");
              echo ($user[0]);
              echo ("<img src= '".$destino."' atl='preview'>");
              echo ("Postado em: ".$local."<br>");
              echo ($descricao);
              echo ("</div>");
              echo ("<input type='submit' class='buttons_large buttons_large-2' value='Enviar'>");
              echo ("</form");
            }
        }
      }
    ?>

  </body>
</html>
