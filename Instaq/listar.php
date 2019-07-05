<!DOCTYPE html>


<?php
require_once "banco.php";
$sql = "select nome, email, usuario from usuarios";
//echo "<table border='5'>";
//echo "<tr> <th>Nome</th><th>E-Mail</th><th>User</th></tr>";
$html_string = "<table border='5'>";
$html_string .= "<tr> <th>Nome</th><th>E-Mail</th><th>User</th></tr>";
foreach(getConnection()->query($sql) as $row){
  //echo "<tr>";
  //echo "<th>".$row['nome']."</th>";
  //echo "<th>".$row['email']."</th>";
  //echo "<th>".$row['usuario']."</th>";
  //echo "</tr>";
  $html_string .= "<tr>";
  $html_string .= "<th>".$row['nome']."</th>";
  $html_string .= "<th>".$row['email']."</th>";
  $html_string .= "<th>".$row['usuario']."</th>";
  $html_string .= "</tr>";
  }
//echo "</table>";
$html_string .= "</table>";
echo $html_string;
?>
