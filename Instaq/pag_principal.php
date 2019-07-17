<?php
  require_once "logic/util.php";
  session_start();
  $user = $_SESSION["autenticado"];
  if (!isset($user)){
      header("Location: login.php");
      exit();
  }
  echo($user[0]);
?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
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
    <main class="mainSession">
    <div>
      <?php
      require_once "banco.php";
      require_once "logic/util.php";
      $sql = "select id_user, id_img, img_path, img_desc, img_local from imagens ORDER BY dt_post DESC";
      $html_string = "<div>";
      foreach(getConnection()->query($sql) as $row){
        try {
          $sql2 = "SELECT us.usuario FROM usuarios AS us, imagens AS img WHERE ".$row['id_user']." = us.id";
          $stmt = getConnection()->prepare($sql2);
          $stmt->execute();
          $user_temp = $stmt->fetch();
        }catch(PDOException $e){
          echo "Erro: ". $e->getMessage();
          die;
        }
        $html_string .= "<div class='main_pub'>";
        $html_string .=   $user_temp[0];
        $html_string .=   "<img src= '".$row['img_path']."' atl='".$row['img_desc']."'>";
        $html_string .=   "Postado em: ".$row['img_local']."<br>";
        $html_string .=   $row['img_desc'];
        $html_string .=   "<form method= 'post' class='main_pub main_pub_comment enctype='multipart/form-data' action='/logic/enviarComentario.php'>";
        $html_string .=     "<input type='text' name='comentario'>";
        $html_string .=     "<input type='submit' value='Comentar'>";
        $html_string .=     "<input type='hidden' name='img_id' value='".$row['id_img']."'>";
        $html_string .=   "</form>";
                              $sql = "SELECT id_img, id_user_comentario, comentario from comentarios_imgs WHERE ".$row['id_img']." = id_img ORDER BY dt_comentario DESC";
                              foreach(getConnection()->query($sql) as $row){
                                try {
                                  $sql2 = "SELECT usuario FROM usuarios WHERE ".$row['id_user_comentario']." = id";
                                  $stmt = getConnection()->prepare($sql2);
                                  $stmt->execute();
                                  $user_temp = $stmt->fetch();
                                }catch(PDOException $e){
                                  echo "Erro: ". $e->getMessage();
                                  die;
                                }
                                $html_string .="<div class='main_pub main_pub_comment'>";
                                $html_string .=   $user_temp[0].": ";
                                $html_string .=   $row['comentario'];
                                $html_string .=   "<br>";
                                $html_string .="</div>";
                              }
        $html_string .= "</div>";
      }

      $html_string .= "</div>";
      echo $html_string;
      ?>
    </div>
    </main>
  </body>
</html>
