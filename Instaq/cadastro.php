<?php
//var_dump($_POST);
//$_GET; //variavel padrão para pegar GET
//$_POST //variavel padrão para pegar POST
//$_REQUEST //pega tanto get quanto post
$email = $_POST['email'];
$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$concordo = $_POST['concordo'];

$username = 'instamatch';
$password = '9179';
try{
  $conn = new PDO('mysql:host=localhost;dbname=instamatch', $username, $password);
  $sql = 'INSERT INTO usuarios(nome, email, usuario, senha)' .
          'VALUES (:nome, :email, :usuario, :senha)';
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':usuario', $usuario);
  $stmt->bindParam(':senha', $senha);
  $stmt->execute();
  echo 'Tudo Certo!';
}catch(PDOException $e){
  echo "Erro: ". $e->getMessage();
}
?>
