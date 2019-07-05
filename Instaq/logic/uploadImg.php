<?php
require_once "../banco.php";
require_once "util.php";
session_start();
$descricao = fromPost("descricao");
$local = fromPost("local");
if(empty($descricao)){
  $descricao = "";
}
if(empty($local)){
  $local = "";
}

if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {

    $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
    $nome = $_FILES[ 'arquivo' ][ 'name' ];

    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
    $extensao = strtolower ( $extensao );
    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        $novoNome = uniqid ( time () ) . '.' . $extensao;

        // Concatena a pasta com o nome
        $destino = "../users/".$_SESSION['usuario']."/uploads/".$novoNome;

        // tenta mover o arquivo para o destino
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
            echo ' < img src = "' . $destino . '" />';
            try {
              $sql = "SELECT id FROM usuarios WHERE usuario = '".$_SESSION['usuario']."'";
              $stmt = getConnection()->prepare($sql);
              $stmt->execute();
              $id_temp = $stmt->fetch();
              echo $id_temp["id"];
            }catch(PDOException $e){
              echo "Erro: ". $e->getMessage();
              die;
            }
            try{
              $sql = 'INSERT INTO imagens(id_user, img_path, img_desc, img_local)' .
                      'VALUES (:id, :img_path, :img_desc, :img_local)';
              $stmt = getConnection()->prepare($sql);
              $stmt->bindParam(':id', $id_temp[0]);
              $stmt->bindParam(':img_path', $destino);
              $stmt->bindParam(':img_desc', $descricao);
              $stmt->bindParam(':img_local', $local);
              $stmt->execute();
            }catch(PDOException $e){
              echo "Erro: ". $e->getMessage();
              die;
            }
        }
        else
            echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
    }
    else
        echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
}
else
    echo 'Você não enviou nenhum arquivo!';
?>
