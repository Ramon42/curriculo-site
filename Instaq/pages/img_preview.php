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
      <form method='post' enctype='multipart/form-data' action='uploadImg.php'>
      <a href='../nav.php?page=enviarFoto' class='top_bar_back_button' name='back_button'><i class='fas fa-arrow-left'></i></a>
      <?php echo($user['usuario'])?>
      <img src= '<?php echo($destino) ?>' atl='preview'>
      Postado em: <?php echo($local)?> <br>
      <?php echo($descricao)?>
      <input type='submit' class='buttons_large buttons_large-2' value='Enviar'>
      </form>
    </div>
    <div class="col-3 div_float">
      <div class="main_pub">
        <h3>BLUR</h3>
        <form class="" action="../logic/filters.php" method="post">
          <input type="range" min="0" max="10" step="1" name="blur_eff" value="0">
          <input type="submit">
        </form>
      </div>
    </div>

</section>
