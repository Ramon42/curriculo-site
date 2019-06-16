<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title></title>
  </head>
  <body>
    <main>
      <section id="infos">
        <div>
          <form action="registro.php" method="post">
            <label for="nome"> Nome e Sobrenome:</label><br>
            <input type="text" name="nome" required="true"
              placeholder="Insira seu nome e sobrenome"><br>
            <label for="apelido">Apelido:</label><br>
            <input type="text" name="apelido" placeholder="Insira seu apelido"><br>
            <label for="telefone">Telefone:</label><br>
            <input type="text" name="telefone" required ="true" pattern="/^\(?\d{2}\)?\s?\d{5}\-?\d{4}$/"
              oninvalid="setCustomValidity('Ex: (XX)xxxxx-xxxx .')" onchange="try{setCustomValidity('')}catch(e){}"
              placeholder="Insira seu telefone (Com DDD)" title="Ex: (10)12345-6789"><br>
            <label for="email">E-mail:</label><br>
            <input type="email" name="email" required="true" placeholder="Insira seu E-mail"><br><br>
            <div>
              <button type="submit" name="cadastrar" class="buttons">Cadastrar contato</button>
            </div>
          </form>
          <form action="listar.php">
            <button class="buttons">Lista de contatos</a>
          </form>
        </div>
      </section>
    </main>
  </body>
</html>
