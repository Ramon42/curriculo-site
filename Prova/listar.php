<?php
require_once "banco.php";
echo "<link rel='stylesheet' href='/css/style.css'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
$html_string = "<div id = 'infos'>";
$html_string .= "<form method='POST' action='excluir.php'>";
$html_string .= "<table border='5' class='tabela'>";
$html_string .= "<tr> <th>Nome</th><th>Apelido</th><th>Telefone</th><th>E-Mail</th> <th>Excluir</th> </tr>";
$sql = "select nome, apelido, telefone, email from contatos";
foreach(getConnection()->query($sql) as $row){
  $html_string .= "<tr>";
  $html_string .= "<th>".$row['nome']."</th>";
  $html_string .= "<th>".$row['apelido']."</th>";
  $html_string .= "<th>".$row['telefone']."</th>";
  $html_string .= "<th>".$row['email']."</th>";
  $html_string .= "<th> <input type='checkbox' name='emails[]' value = '".$row['email']."'></th>";
  //$html_string .= "<th> <input type='checkbox' name='".$row['email']."'></th>";
  $html_string .= "</tr>";
  }

$html_string .= "<button type='submit' class='buttons' name='button'>Excluir selecionados</button>";
$html_string .= "</table>";
$html_string .= "</form>";
$html_string .= "<form action='index.php'>".
                  "<button class='buttons'>Cadastrar novo</a>".
                "</form>".
                "</div>";

echo $html_string;

?>
