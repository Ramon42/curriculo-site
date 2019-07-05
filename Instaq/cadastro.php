<?php
//var_dump($_POST);
//$_GET; //variavel padrão para pegar GET
//$_POST //variavel padrão para pegar POST
//$_REQUEST //pega tanto get quanto post
require_once "banco.php";

$email = $_POST['email'];
$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
if (isset($_POST['concordo'])){
  $concordo = $_POST['concordo'];
}
//verificação
if(isset($email)){
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    die ("Email não é válido!");
  }
}
if(!isset($nome)){ //checa se nome foi preenchido
  die ("Nome obrigatório");
}
if(!isset($usuario)){
  die ("Usuário obrigatório");
}
if(empty($senha)){
  die ("Senha obrigatória");
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
  echo "Tudo Certo!"; //aspas duplas permite concatenação
}catch(PDOException $e){
  echo "Erro: ". $e->getMessage();
}
?>
