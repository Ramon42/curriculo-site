<?php
function getConnection(){
  $username = 'root';
  $password = '';
  $conn = new PDO('mysql:host=localhost;dbname=prova1', $username, $password);
  return $conn;
}
?>
