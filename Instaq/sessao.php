<?php
require_once "banco.php";
require_once "logic/util.php";
session_start();
$usuario = fromPost('usuario');
$senha = fromPost('senha');

$messages = "";
if (empty($usuario)) {
  $messages .= ("<li>Usuário obrigatório</li>");
}
if (empty($senha)) {
  $messages .= ("<li>Senha obrigatória</li>");
}
if (strlen($messages) > 0){
  $messages = "<ul>".$messages."</ul>";
  toSession("messages", $messages);
  toSession("usuario", $usuario);
  header("Location: login.php");   //https://stackoverflow.com/questions/2112373/php-page-redirect
  exit();
}

try{
      $sql = "SELECT nome, email, usuario FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
      $stmt = getConnection()->prepare($sql);
      $stmt->execute();
      $resultados = $stmt->fetch();
      if($resultados){
        toSession("autenticado", $resultados);
        header("Location: pag_principal.php");
      }
      else{
        toSession("messages", "Usuário/Senha incorretos.");
        header('location:login.php');
      }
    }catch(PDOException $e){
      echo "Erro: ". $e->getMessage();
    }
?>
