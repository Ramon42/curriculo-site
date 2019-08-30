<?php
$descricao = $_COOKIE['descricao_temp'];
$local = $_COOKIE['local_temp'];
$destino = $_COOKIE['path_temp'];
if (!isset($user)){
    header("Location: login.php");
    exit();
}
?>

<section>
    <div class="col-3 div_float">
    </div>
    <div class='main_pub col-6 div_float'>
      <form method='post' enctype='multipart/form-data' action='../logic/uploadImg.php'>
      <a href="../nav.php?page=enviarFoto" class='top_bar_back_button' name='back_button'><i class='fas fa-arrow-left'></i></a>
      <?php echo($user['usuario'])?>
      <img src= '<?php echo($destino) ?>' atl='preview'>
      Postado em: <?php echo($local)?> <br>
      <?php echo($descricao)?>
      <input type='submit' class='buttons_large buttons_large-2' value='Enviar'>
      </form>
    </div>
    <div class="col-3">
    </div>

</section>
