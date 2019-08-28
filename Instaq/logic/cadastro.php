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

$default_bio = "Conte mais sobre você aqui!";
$default_profile_img = "../images/profile_icon.png";
//verificação
$messages = "";
if (empty($email)) {
  $messages .= ("<li>E-mail obrigatório</li>");
}
if(isset($email)){
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $messages .=("<li>E-mail inválido</li>");
  }
}
if(!empty($email)){
  $sqlValidarUser = "SELECT COUNT(*) FROM usuarios WHERE email = '".$email."'";
  $stmt = getConnection()->prepare($sqlValidarUser);
  $stmt->execute();
  $count = $stmt->fetchColumn();
  if($count != 0){
    $messages .= ("<li>E-Mail já cadastrado</li>");
  }
}
if (empty($nome)) {
  $messages .= ("<li>Nome obrigatório</li>");
}
if (empty($usuario)) {
  $messages .= ("<li>Usuário obrigatório</li>");
}
if(!empty($usuario)){
  $sqlValidarUser = "SELECT COUNT(*) FROM usuarios WHERE usuario = '".$usuario."'";
  $stmt = getConnection()->prepare($sqlValidarUser);
  $stmt->execute();
  $count = $stmt->fetchColumn();
  if($count != 0){
    $messages .= ("<li>Usuário já existe</li>");
  }
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
  mkdir("../users/".$usuario."/img_perfil");
}catch(PDOException $e){
  echo "Erro: ". $e->getMessage();
  die;
}
try {
  $sql = "SELECT id FROM usuarios WHERE usuario = :usuario";
  $stmt = getConnection()->prepare($sql);
  $stmt->bindParam(':usuario', $usuario);
  $stmt->execute();
  $id_temp = $stmt->fetch();
  try {
    $sql = "INSERT INTO perfil(id, bio, img_perfil) VALUES (:id, :bio, :img_perfil)";
    $stmt = getConnection()->prepare($sql);
    $stmt->bindParam(':id', $id_temp[0]);
    $stmt->bindParam(':bio', $default_bio);
    $stmt->bindParam(':img_perfil', $default_profile_img);
    $stmt->execute();
  } catch (PDOException $e) {
    echo "Erro: ". $e->getMessage();
    die;
  }

} catch (PDOException $e) {
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
