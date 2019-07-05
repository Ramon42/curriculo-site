<?php
//var_dump($_POST);
//$_GET; //variavel padrão para pegar GET
//$_POST //variavel padrão para pegar POST
//$_REQUEST //pega tanto get quanto post
require_once "../banco.php";
require_once "util.php";
$email = fromPost("email");
$nome = fromPost("nome");
$usuario = fromPost("usuario");
$senha = fromPost("senha");
$concordo = fromPost("concordo");
//verificação
$messages = "";
if (empty($email)) {
  $messages .= ("<li>E-mail obrigatório</li>");
}
if (empty($nome)) {
  $messages .= ("<li>Nome obrigatório</li>");
}
if (empty($usuario)) {
  $messages .= ("<li>Usuário obrigatório</li>");
}
if (empty($senha)) {
  $messages .= ("<li>Senha obrigatória</li>");
}
if (!isset($concordo)){
  $messages .= ("<li>Você precisa aceitar os termos para se cadastrar</li>");
}
if (strlen($messages) > 0){
  $messages = "<ul>".$messages."</ul>";
  toSession("messages", $messages);
  header("Location: ../registro.php");   //https://stackoverflow.com/questions/2112373/php-page-redirect
  exit();
}

try{
  $sql = 'INSERT INTO usuarios(nome, email, usuario, senha)' .
          'VALUES (:nome, :email, :usuario, :senha)';
  $stmt = getConnection()->prepare($sql);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':usuario', $usuario);
  $stmt->bindParam(':senha', $senha);
  $stmt->execute();
  mkdir("../users/".$usuario);
  mkdir("../users/".$usuario."/uploads");
}catch(PDOException $e){
  echo "Erro: ". $e->getMessage();
  die;
}
?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Instamatch - Registro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body class="back-photo">
  <main>
    <section class="mainSection" name="test">
      <header>
        <h1 class="title"><i class="fas fa-camera-retro"></i>Insta<span class="clone">Match</span></h1>
        <h3>Cadastro efetuado com sucesso!</h3>
      </header>
    <div>
      <h3>Faça login</h3>
      <a class="buttons_large buttons_large-2" href="../login.php">Conecte-se</a>
    </div>
  </body>
</html>
