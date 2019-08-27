<?php
  require_once "../bootstrap.php";
  $search_user = fromPost("buscar");
  if(empty($search_user)){
    header ("Location: ../nav.php?page=perfil");
  }
  else{
    $sql = "SELECT id, usuario FROM usuarios WHERE usuario LIKE '%$search_user%'";
    $html_string = "<form method='POST' action='../logic/seguir_user.php'>";
    $html_string .= "<table class=''>";
    foreach (getConnection()->query($sql) as $row) {
      try {
        $html_string .="<tr>";
        $html_string .= "<td><a href='nav.php?page=new_follow' class='button'>".$row['usuario']."</a></td>";
        $html_string .= "<td><button type='submit' class='button' name='id_seguir' value='".$row['id']."'>Seguir</button></td>";
        $html_string .= "</tr>";
      } catch (PDOException $e) {
        echo "Erro: ". $e->getMessage();
        die;
      }
    }
    $html_string .= "</table>";
    $html_string .= "</form>";
    echo ($html_string);
  }

?>
