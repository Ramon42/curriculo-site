<header class="top_user_bar">
  <div id="search_area">
      <form action="logic/buscar_usuario.php" method="post">
        <input type="text" name="buscar" class="top_bar_search_bar" required="false" placeholder="Buscar"/>
        <button type='submit' class="top_bar_search_button" name="search_button"><i class="fas fa-search"></i></button>
      </form>
    <a href="nav.php?page=perfil" id="link_profile"><?php echo ("Usuário:" .$user['usuario']); ?></a>
    <a href="login.php" class = "buttons_large" id="link_profile">Logout</a>
  </div>
  <a href="enviarFoto.php" class="buttons_large buttons_large-2">Enviar uma Foto</a>

</header>
<main class="mainSession">
<div>
  <?php
  //utilizando tabela v_postagens
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
  ?>
</div>
</main>
