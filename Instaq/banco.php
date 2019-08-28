<?php
function getConnection(){
  $username = 'root';
  $password = '';
  $conn = new PDO('mysql:host=localhost;dbname=instamatch', $username, $password);
  return $conn;
}
?>
