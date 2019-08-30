<?php
require_once "util.php";
require_once "../banco.php";
session_start();
$user = $_SESSION["autenticado"];
$id_img = fromPost('id_img');
$pg_atual = fromGet('pg');
$id = fromGet('id_busca');

if (!isset($user)){
    header("Location: ../login.php");
    exit();
}
if(empty($id_img)){
  header("location: ../nav.php?page=main_page");
  exit();
}

$sql = "INSERT INTO curtidas(id_user, id_img) VALUES (:id_user, :id_img)";
try {
  $stmt = getConnection()->prepare($sql);
  $stmt->bindParam(':id_user', $user['id']);
  $stmt->bindParam(':id_img', $id_img);
  $stmt->execute();
  header("location: ../nav.php?page=".$pg_atual."&id_busca=".$id."");
} catch (PDOException $e) {
  echo "Erro: ". $e->getMessage();
  die;
}


?>
