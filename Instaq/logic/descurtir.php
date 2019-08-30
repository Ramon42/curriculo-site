<?php
require_once "util.php";
require_once "../banco.php";
session_start();
$user = $_SESSION["autenticado"];
$id_img = fromPost('id_img');
$pg_atual = fromGet('pg');

if (!isset($user)){
    header("Location: ../login.php");
    exit();
}
if(empty($id_img)){
  header("location: ../nav.php?page=main_page");
  exit();
}

$sql = "DELETE FROM curtidas WHERE id_user = :id_user AND id_img = :id_img";
try {
  $stmt = getConnection()->prepare($sql);
  $stmt->bindParam(':id_user', $user['id']);
  $stmt->bindParam(':id_img', $id_img);
  $stmt->execute();
  header("location: ../nav.php?page=".$pg_atual."");
} catch (PDOException $e) {
  echo "Erro: ". $e->getMessage();
  die;
}


?>
