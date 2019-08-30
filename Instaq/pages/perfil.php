<?php
  $sql = "SELECT bio, img_perfil FROM perfil WHERE id = ".$user['id']."";
  foreach(getConnection()->query($sql) as $row){
    $bio = $row['bio'];
    $img_perfil = $row['img_perfil'];
  }
?>
<section>
  <div class="main_perfil">
    <a href="../nav.php?page=main_page" class="top_bar_back_button" name="back_button"><i class="fas fa-arrow-left"></i></a>
    <div class="foto_perfil">
      <img src="<?php echo($img_perfil); ?>" alt="img_perfil">
    </div>
    <div class="descricao_perfil">
      <p><?php echo($bio); ?></p>
    </div>
    <div class="infos_perfil">

    </div>
    <div class="">
      <a href="nav.php?page=editar_perfil" class="buttons_large buttons_profile">Editar Perfil</a>
    </div>
    <div class="seguidores">
      <a href="nav.php?page=new_follow" class="buttons_large buttons_profile">Seguidores</a>
    </div>
    <div class="seguidores">
      <a href="nav.php?page=seguindo" class="buttons_large buttons_profile">Seguindo</a>
    </div>
  </div>
  <div class="suas_fotos">
    <?php
      $sql = "SELECT img_path, img_desc, img_local, id_img FROM imagens WHERE id_user = ".$user['id']." ORDER BY dt_post DESC";
      $column_count = 0;
      $html_string = "<table class=''>";
      $html_string .="<tr>";
      foreach(getConnection()->query($sql) as $row){
        try {
          $sql = "SELECT * FROM curtidas WHERE id_img = '".$row['id_img']."'";
          $stmt = getConnection()->query($sql);
          $num_curtidas = $stmt->fetchColumn();
          $html_string .= "<td align='center'>";
          $html_string .= "<div class=''>";
          $html_string .=   "<div class='col-5'>";
          $html_string .=     "<img src= '".$row['img_path']."' atl='".$row['img_desc']."'>";
          $html_string .=     $num_curtidas." curtidas.<br>";
          $html_string .=     "Postado em: ".$row['img_local']."<br>";
          $html_string .=     $row['img_desc'];
          $html_string .=   "</div>";
          $html_string .= "</td>";
          $column_count += 1;
          if($column_count == 3){
            $html_string .= "</tr>";
            $html_string .= "<tr>";
            $column_count = 0;
          }

        } catch (PDOException $e) {
          echo "Erro: ". $e->getMessage();
          die;
        }
      }
      $html_string .= "</tr>";
      $html_string .= "</table>";
      echo $html_string;
    ?>
  </div>
</section>
