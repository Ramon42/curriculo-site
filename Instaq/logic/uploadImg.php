<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title></title>
  </head>
  <body>


    <?php
    require_once "../banco.php";
    require_once "util.php";
    session_start();
    $descricao = $_COOKIE['descricao_temp'];
    $local = $_COOKIE['local_temp'];
    $destino = $_COOKIE['path_temp'];
    $user = $_SESSION["autenticado"];
    if (!isset($user)){
        header("Location: login.php");
        exit();
    }

    try {
      $sql = "SELECT id FROM usuarios WHERE usuario = '".$user[2]."'";
      $stmt = getConnection()->prepare($sql);
      $stmt->execute();
      $id_temp = $stmt->fetch();
    }catch(PDOException $e){
      echo "Erro: ". $e->getMessage();
      die;
    }
    try{
      $sql = 'INSERT INTO imagens(id_user, img_path, img_desc, img_local)' .
              'VALUES (:id, :img_path, :img_desc, :img_local)';
      $stmt = getConnection()->prepare($sql);
      $stmt->bindParam(':id', $id_temp[0]);
      $stmt->bindParam(':img_path', $destino);
      $stmt->bindParam(':img_desc', $descricao);
      $stmt->bindParam(':img_local', $local);
      $stmt->execute();
      header ("Location: ../nav.php?page=main_page");
    }catch(PDOException $e){
      echo "Erro: ". $e->getMessage();
      die;
    }

    ?>
</body>
</html>
