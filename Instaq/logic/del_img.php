<?php
require_once "../bootstrap.php";
$id_img = fromGet("id");
$pg_atual = fromGet('pg');
session_start();
$user = $_SESSION["autenticado"];
$sql="DELETE FROM imagens WHERE id_img= ".$id_img." AND id_user= ".$user['id']."";
try {
  $stmt = getConnection()->prepare($sql);
  echo $sql;
  $stmt->execute();
  header("location: ../nav.php?page=".$pg_atual."");
} catch (PDOException $e) {
  echo "Erro: ". $e->getMessage();
  die;
}
?>
