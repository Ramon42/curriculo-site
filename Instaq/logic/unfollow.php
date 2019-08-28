<?php
  require_once "../bootstrap.php";
  session_start();
  $user = $_SESSION["autenticado"];
  $id_unfollow = fromPost("id_unf");
  try {
  $sql = "DELETE FROM seguidores WHERE id_user= :id AND id_user_segue= :id_unf";
    $stmt = getConnection()->prepare($sql);
    $stmt->bindParam(':id', $user['id']);
    $stmt->bindParam(':id_unf', $id_unfollow);
    $stmt->execute();
    header('location: ../nav.php?page=perfil_busca&id_busca='.urldecode($id_unfollow).'');
  } catch (PDOException $e) {
    echo "Erro: ". $e->getMessage();
    die;
  }
?>
