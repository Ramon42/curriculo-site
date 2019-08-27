<section class="">
  <div class="foto_perfil">
    <h1>TESTE ALGUMA COISA AQUI DO PERFIL</h1>
  </div>
  <div class="descricao_perfil">

  </div>
  <div class="infos_perfil">

  </div>
  <div class="">
    <a href="nav.php?page=editar_perfil">Editar Perfil</a>
  </div>
  <div class="seguidores">
    <a href="nav.php?page=new_follow" class="button">Ver Usuários</a>
  </div>
  <div class="suas_fotos">
    <?php
      $sql = "SELECT img_path, img_desc, img_local FROM imagens WHERE id_user = ".$user['id']." ORDER BY dt_post DESC";
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
