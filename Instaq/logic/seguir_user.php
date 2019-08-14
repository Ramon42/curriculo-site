<?php
  require_once "../bootstrap.php";
  session_start();
  $user = $_SESSION["autenticado"];
  $id_seguir_novo = fromPost("id_seguir");
  try {
  $sql = 'INSERT INTO seguidores(id_user, id_user_segue) VALUES (:id, :id_seguir)';
    $stmt = getConnection()->prepare($sql);
    $stmt->bindParam(':id', $user['id']);
    $stmt->bindParam(':id_seguir', $id_seguir_novo);
    $stmt->execute();
  } catch (PDOException $e) {
    echo "Erro: ". $e->getMessage();
    die;
  }

?>
