<?php
require_once "../banco.php";
require_once "util.php";
session_start();
$user = $_SESSION["autenticado"];
$bio = fromPost("bio");
if ( isset( $_FILES[ 'arquivo_perfil' ][ 'name' ] ) && $_FILES[ 'arquivo_perfil' ][ 'error' ] == 0 ) {
  $arquivo_tmp = $_FILES[ 'arquivo_perfil' ][ 'tmp_name' ];
  $nome = $_FILES[ 'arquivo_perfil' ][ 'name' ];
  echo "entrou";
  $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
  $extensao = strtolower ( $extensao );
  if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
    $novoNome = uniqid ( time () ) . '.' . $extensao;

    // Concatena a pasta com o nome
    $destino = "../users/".$user['usuario']."/img_perfil/".$novoNome;
    if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
      $sql = "UPDATE perfil SET bio = '".$bio."', img_perfil = '".$destino."' WHERE id = ".$user['id']."";
    }
  }
}
else{
  $sql = "UPDATE perfil SET bio = '".$bio."' WHERE id = ".$user['id']."";
}

try {
  $stmt = getConnection()->prepare($sql);
  $stmt->execute();
  header("Location: ../nav.php?page=perfil");

} catch (PDOException $e) {
  echo "Erro: ". $e->getMessage();
  die;
}

?>
