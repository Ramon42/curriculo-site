<?php
function getConnection(){
  $username = 'ramon';
  $password = '9179';
  $conn = new PDO('mysql:host=localhost;dbname=instamatch', $username, $password);
  return $conn;
}
?>
