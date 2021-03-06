<?php
  require_once "../banco.php";
  require_once "util.php";
  session_start();
  $user = $_SESSION["autenticado"];
  if (!isset($user)){
      header("Location: login.php");
      exit();
  }
  $comentario = fromPost("comentario");
  if (empty($comentario)){
    header ("location: ../nav.php?page=main_page");
    exit();
  }
  $id_img = fromPost("img_id");
  try{
    $sql = "INSERT INTO comentarios_imgs (id_img, id_user_comentario, comentario)".
            "VALUES (:id_img, :id_user, :comentario)";
    $stmt = getConnection()->prepare($sql);
    $stmt->bindParam(':id_img', $id_img);
    $stmt->bindParam(':id_user', $user[3]);
    $stmt->bindParam(':comentario', $comentario);
    $stmt->execute();
    header ("location: ../nav.php?page=main_page");
  }catch(PDOException $e){
    echo "Erro: ". $e->getMessage();
    die;
  }
?>
