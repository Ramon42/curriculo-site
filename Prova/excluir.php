<?php
require_once "banco.php";
echo "<link rel='stylesheet' href='/css/style.css'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<div id='infos'>";

if(isset($_POST['emails'])){
  $checkboxes = $_POST['emails'];
  foreach ($checkboxes as $aux_del) {
    try{
      $sql = "DELETE FROM contatos WHERE email = :email_del";
      $stmt = getConnection()->prepare($sql);
      $stmt->bindValue(':email_del', $aux_del);
      $stmt->execute();
    }catch(PDOException $e){
      echo "Erro: ". $e->getMessage();
    }
  }

  echo "Contatos excluidos!".
          "<form action='listar.php'>".
            "<button class='buttons'>Retornar</a>".
          "</form>".
        "</div>";
}
else{
echo "Nenhum contato selecionado!".
        "<form action='listar.php'>".
          "<button class='buttons'>Retornar</a>".
        "</form>".
      "</div>";
}
?>
