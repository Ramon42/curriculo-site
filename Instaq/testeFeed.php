<?php
require_once "banco.php";
require_once "logic/util.php";
$sql = "select id_user, img_path, img_desc, img_local from imagens";
//echo "<table border='5'>";
//echo "<tr> <th>Nome</th><th>E-Mail</th><th>User</th></tr>";
$html_string = "<ul>";
foreach(getConnection()->query($sql) as $row){
  $html_string .= "<li>".$row['id_user']."</li>";
  $html_string .= "<li><img src= '".$row['img_path']."' atl='".$row['img_desc']."'></li>";
  $html_string .= "<li>".$row['img_local']."</li>";
  $html_string .= "<li>".$row['img_desc']."</li>";
  }
$html_string .= "</ul>";
echo $html_string;
?>
