<?php
  require_once "bootstrap.php";
  session_start();
  $user = $_SESSION["autenticado"];
  if (!isset($user)){
      header("Location: login.php");
      exit();
  }
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
      <div id="search_area">
          <form action="logic/buscar_usuario.php" method="post">
            <input type="text" name="buscar" class="top_bar_search_bar" required="false" placeholder="Buscar"/>
            <button type='submit' class="top_bar_search_button" name="search_button"><i class="fas fa-search"></i></button>
          </form>
        <a href="perfil.php" id="link_profile"><?php echo ("Usuário:" .$user['usuario']); ?></a>
        <a href="login.php" class = "buttons_large" id="link_profile">Logout</a>
      </div>
      <a href="enviarFoto.php" class="buttons_large buttons_large-2">Enviar uma Foto</a>

      <!-- TESTE DE PÁGINAS SEPARADAS -->
      <a href="nav.php?page=perfil" class="buttons_large">PERFIL</a>
      <!---->
    </header>
    <main class="mainSession">
    <div>
      <?php
      //utilizando tabela v_postagens
      echo($user['id']);
      $sql = "SELECT us.usuario, vp.id_user_segue, vp.id_img, vp.img_path, vp.img_desc, vp.img_local FROM v_postagens AS vp, usuarios AS us WHERE vp.id_user_segue = us.id AND id_user = ".$user['id']."";
      $html_string = "<div>";
      foreach (getConnection()->query($sql) as $row){
        try{
          $html_string .= "<div class='main_pub'>";
          $html_string .= $row['usuario'];
          $html_string .= "<img src= '".$row['img_path']."' atl='".$row['img_desc']."'>";
          $html_string .=   "Postado em: ".$row['img_local']."<br>";
          $html_string .=   $row['img_desc'];
          $html_string .=   "<form method= 'post' class='main_pub main_pub_comment enctype='multipart/form-data' action='/logic/enviarComentario.php'>";
          $html_string .=     "<input type='text' name='comentario'>";
          $html_string .=     "<input type='submit' value='Comentar'>";
          $html_string .=     "<input type='hidden' name='img_id' value='".$row['id_img']."'>";
          $html_string .=   "</form>";
          $sql2 = "SELECT us.usuario, com.comentario FROM usuarios AS us, comentarios_imgs AS com, imagens AS img WHERE img.id_img = com.id_img".
          " AND us.id = com.id_user_comentario AND com.id_img = ".$row['id_img']." ORDER BY dt_comentario DESC";
          foreach (getConnection()->query($sql2) as $row2) {
            $html_string .="<div class='main_pub main_pub_comment'>";
            $html_string .=   $row2['usuario'].": ";
            $html_string .=   $row2['comentario'];
            $html_string .=   "<br>";
            $html_string .="</div>";
          }
        }catch(PDOException $e){
          echo "Erro: ". $e->getMessage();
          die;
        }
        $html_string .= "</div>";
      }
      echo ($html_string);
      //TESTE PÁGINA MOSTRANDO APENAS PUBS SEGUIDAS
      /*
        $sql = "SELECT id_user_segue FROM seguidores WHERE id_user = ".$user['id']." ";
        $html_string = "<div>";
        foreach (getConnection()->query($sql) as $row1){ //checa usuários seguidos
          $sql2 = "SELECT id_user, id_img, img_path, img_desc, img_local FROM imagens WHERE id_user = ".$row1['id_user_segue']." OR id_user = ".$user['id']." ORDER BY dt_post DESC";
          foreach (getConnection()->query($sql2) as $row2) {//checa publucações de usuários seguidos
            try {
              $sql3 = "SELECT us.usuario FROM usuarios AS us, imagens AS img WHERE ".$row2['id_user']." = us.id";
              $stmt = getConnection()->prepare($sql3); //retorna infos do usuário que publicou a foto
              $stmt->execute();
              $user_temp = $stmt->fetch();
            }catch(PDOException $e){
              echo "Erro: ". $e->getMessage();
              die;
            }
            $html_string .= "<div class='main_pub'>";
            $html_string .=   $user_temp[0];
            $html_string .=   "<img src= '".$row2['img_path']."' atl='".$row2['img_desc']."'>";
            $html_string .=   "Postado em: ".$row2['img_local']."<br>";
            $html_string .=   $row2['img_desc'];
            $html_string .=   "<form method= 'post' class='main_pub main_pub_comment enctype='multipart/form-data' action='/logic/enviarComentario.php'>";
            $html_string .=     "<input type='text' name='comentario'>";
            $html_string .=     "<input type='submit' value='Comentar'>";
            $html_string .=     "<input type='hidden' name='img_id' value='".$row2['id_img']."'>";
            $html_string .=   "</form>";
                                  $sql = "SELECT id_img, id_user_comentario, comentario from comentarios_imgs WHERE ".$row2['id_img']." = id_img ORDER BY dt_comentario DESC";
                                  foreach(getConnection()->query($sql) as $row3){
                                    try {
                                      $sql2 = "SELECT usuario FROM usuarios WHERE ".$row3['id_user_comentario']." = id";
                                      $stmt = getConnection()->prepare($sql2);
                                      $stmt->execute();
                                      $user_temp = $stmt->fetch();
                                    }catch(PDOException $e){
                                      echo "Erro: ". $e->getMessage();
                                      die;
                                    }
                                    $html_string .="<div class='main_pub main_pub_comment'>";
                                    $html_string .=   $user_temp[0].": ";
                                    $html_string .=   $row3['comentario'];
                                    $html_string .=   "<br>";
                                    $html_string .="</div>";
                                  }
            $html_string .= "</div>";
          }
        }
        $html_string .= "</div>";
        echo $html_string;
        */
      //


      /* PÁGINA MOSTRANDO FOTOS DE TODOS OS USUARIOS
            $sql = "SELECT id_user, id_img, img_path, img_desc, img_local FROM imagens ORDER BY dt_post DESC";
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
            */
            ?>
    </div>
    </main>
  </body>
</html>
