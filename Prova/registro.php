<?php
require_once "banco.php";
echo "<link rel='stylesheet' href='/css/style.css'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<div id='infos'>";

$nome = $_POST['nome'];
$apelido = $_POST['apelido'];
$tel = $_POST['telefone'];
$email = $_POST['email'];

$validPhone = "/^\(?\d{2}\)?\s?\d{5}\-?\d{4}$/";
$validName = "/^([A-Z][a-z]* ){1,}[A-Z][a-z]*/";

if(isset($nome)){
  if(!preg_match($validName, $nome)){
    echo "Insira um nome válido.".
    "<form action='index.php'>".
              "<button class='buttons'>Retornar</a>".
            "</form>".
          "</div>";
    die;
  }
}
else{
  echo "Insira um nome.".
  "<form action='index.php'>".
            "<button class='buttons'>Retornar</a>".
          "</form>".
        "</div>";
  die;
}

if(isset($tel)){
  if(!preg_match($validPhone, $tel)){
    echo "Insira um telefone válido.".
    "<form action='index.php'>".
              "<button class='buttons'>Retornar</a>".
            "</form>".
          "</div>";
    die;
  }
}
else{
  echo "Insira um telefone.".
  "<form action='index.php'>".
            "<button class='buttons'>Retornar</a>".
          "</form>".
        "</div>";
  die;
}

if(isset($email)){
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo ("Email não é válido!");
    echo    "<form action='index.php'>".
              "<button class='buttons'>Retornar</a>".
            "</form>".
          "</div>";
    die;
  }
}
else{
  echo "Insira um E-mail.".
  "<form action='index.php'>".
            "<button class='buttons'>Retornar</a>".
          "</form>".
        "</div>";
  die;
}


try{
  $sql = 'INSERT INTO contatos(nome, apelido, telefone, email)' .
          'VALUES (:nome, :apelido, :telefone, :email)';
  $stmt = getConnection()->prepare($sql);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':apelido', $apelido);
  $stmt->bindParam(':telefone', $tel);
  $stmt->bindParam(':email', $email);

  $stmt->execute();
  echo "Contato adicionado!".
          "<form action='index.php'>".
            "<button class='buttons'>Adicionar novo</a>".
          "</form>".
          "<form action='listar.php'>".
            "<button class='buttons'>Lista de contatos</a>".
          "</form>".
        "</div>";
}catch(PDOException $e){
  echo "Erro: ". $e->getMessage();
}
?>
