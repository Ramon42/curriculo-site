<section>
  <?php
  $count = 0;
  $sql = "SELECT s.id_user, us.usuario FROM usuarios us, seguidores s WHERE s.id_user_segue = '".$user['id']."' AND s.id_user = us.id AND s.id_user != s.id_user_segue";
  $html_string = "<div class='main_pub'>";
  $html_string .= "<a href='../nav.php?page=perfil' class='top_bar_back_button' name='back_button'><i class='fas fa-arrow-left'></i></a>";
  $html_string .= "<table class='main_pub'>";
    foreach(getConnection()->query($sql) as $row){
      try {
        $html_string .="<tr>";
        $html_string .= "<td><a href='../nav.php?page=perfil_busca&id_busca=".$row['id_user']."' class='buttons_large buttons_large-2'>".$row['usuario']."</a></td>";
        $html_string .= "</tr>";
        $count += 1;
      } catch (PDOException $e) {
        echo "Erro: ". $e->getMessage();
        die;
      }

    }
    $html_string .= "</table>";
    $html_string .= "<h2>Seguidores: ".$count."</h2>";
    $html_string .= "</div>";
    echo $html_string;
  ?>
</section>
