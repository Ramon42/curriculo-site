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
    echo ("Location: ../nav.php?page=perfil_busca&id_busca=$id_seguir_novo");
    //header("Location: ../nav.php?page=perfil_busca&id_busca=$id_seguir_novo");
    header('location: ../nav.php?page=perfil_busca&id_busca='.urldecode($id_seguir_novo).'');
  } catch (PDOException $e) {
    echo "Erro: ". $e->getMessage();
    die;
  }

?>
