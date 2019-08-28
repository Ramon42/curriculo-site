<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body class="back-photo">
    <main>
      <div class="mainSession">
        <form method="post" class="enviarFoto" enctype="multipart/form-data" action="/logic/img_preview.php">
          <a href="../nav.php?page=main_page" class="top_bar_back_button" name="back_button"><i class="fas fa-arrow-left"></i></a>
           <label for="txt_arq">Selecione uma imagem: </label>
           <input name="arquivo" id="txt_arq" type="file"><br>
           <label for="txt_desc">Descrição: </label><br>
           <input type="text" id="txt_desc" name="descricao" class="txtEnviarFoto"><br>
           <label for="txt_local">Localização: </label><br>
           <input type="text" id="txt_local" name="local" class="txtEnviarFoto"><br>
           <input type="submit" class="buttons_large buttons_large-2" value="Ver">
        </form>
      </div>
    </main>
  </body>
</html>
