<?php

  $id = fromGet("id_busca");
  $sql = "SELECT bio, img_perfil FROM perfil WHERE id = ".$id."";
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
    <div class="">
      <form method='POST' action='../logic/seguir_user.php'>
        <button type='submit' class='buttons_large buttons_profile' name='id_seguir' value='<?php echo($id); ?>'>Seguir</button>
      </form>
    </div>
    <div class="seguidores">
      <!--<a href="nav.php?page=new_follow" class="button">Ver Usuários</a>-->
    </div>
  </div>
  <div class="suas_fotos">
    <?php
      $sql = "SELECT img_path, img_desc, img_local FROM imagens WHERE id_user = ".$id." ORDER BY dt_post DESC";
      $column_count = 0;
      $html_string = "<table class=''>";
      $html_string .="<tr>";
      foreach(getConnection()->query($sql) as $row){
        try {
          $html_string .= "<td align='center'>";
          $html_string .= "<div class=''>";
          $html_string .=   "<div class='col-5'>";
          $html_string .=     "<img src= '".$row['img_path']."' atl='".$row['img_desc']."'>";
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
