<section>
  <div class="mainSession">
    <form method="post" class="enviarFoto" enctype="multipart/form-data" action="logic/att_perfil.php">
      <a href='../nav.php?page=perfil' class='top_bar_back_button' name='back_button'><i class='fas fa-arrow-left'></i></a>
       <label for="img_perfil">Alterar foto de Perfil: </label><br>
       <input name="arquivo_perfil" id="img_perfil" type="file"><br><br>
       <label for="txt_bio">Sobre Você: </label><br>
       <textarea name="bio" id="txt_bio" rows="8" cols="40"><?php
          $sql="SELECT bio FROM perfil WHERE id = ".$user['id']."";
          try{
            $stmt = getConnection()->prepare($sql);
            $stmt->execute();
            $bio = $stmt->fetch();
            echo($bio[0]);
          }catch(PDOException $e){
            echo "Erro: ". $e->getMessage();
            die;
          }
       ?></textarea>
       <input type="submit" class="buttons_large buttons_large-2" value="Atualizar">
    </form>
  </div>
</section>
