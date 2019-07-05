<!DOCTYPE html>
<?php
session_unset();
?>
<html lang=pt dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Instamatch - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  </head>
  <body  class="back-photo">
    <main>
      <section class="mainSection">
        <header>
          <h1 class="title"><i class="fas fa-camera-retro"></i>Insta<span class="clone">Match</span></h1>
          <h3>Entre para ver fotos e vídeos dos seus amigos</h3>
        </header>
        <div>
          <form action="sessao.php" method="POST">
            <div>
              <input type="text" id = "usuario" name="usuario" placeholder="Nome de usuário">
            </div>
            <div>
              <input type="password" id = "senha" name="senha" placeholder="Senha">
            </div>
            <div>
              <input type="checkbox" name="lembrar">
              <label for="lembrar">Lembrar senha?</label>
            </div>
            <div>
              <button type="submit" class="buttons_large" name="button">Login</button>
            </div>
          </form>
          <br><a href="registro.php">Esqueceu a senha?</a>
        </div>
      </section>
      <section class="mainSection">
        <footer>
          <h3>Não tem uma conta?</h3>
          <a href="registro.php" class="buttons_large buttons_large-2">Cadastre-se</a>
        </footer>
      </section>
    </main>
  </body>
</html>
