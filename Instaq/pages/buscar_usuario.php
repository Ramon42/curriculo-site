<form method='POST' action='../logic/seguir_user.php'>
<?php
  $search_user = fromPost("buscar");
  if(empty($search_user)){
    header ("Location: ../nav.php?page=perfil");
  }
  else{
    $sql = "SELECT id, usuario FROM usuarios WHERE usuario LIKE '%$search_user%'";
    //$html_string = "<form method='POST' action='../logic/seguir_user.php'>";
    $html_string = "<table class='main_pub'>";
    foreach (getConnection()->query($sql) as $row) {
      try {
        $html_string .="<tr>";
        $html_string .= "<td><a href='../nav.php?page=perfil_busca&id_busca=".$row['id']."' class='button'>".$row['usuario']."</a></td>";
        $html_string .= "<td><button type='submit' class='buttons_large buttons_large-2' name='id_seguir' value='".$row['id']."'>Seguir</button></td>";
        $html_string .= "</tr>";
      } catch (PDOException $e) {
        echo "Erro: ". $e->getMessage();
        die;
      }
    }
    $html_string .= "</table>";
    //$html_string .= "</form>";
    echo ($html_string);
  }
?>
</form>
<a href="../nav.php?page=main_page"  class='buttons_large buttons_large-2'>Voltar</a>
