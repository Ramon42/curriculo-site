<?php
require_once "banco.php";
session_start();
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

try{
      $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha";
      $stmt = getConnection()->prepare($sql);
      $stmt->bindParam(':usuario', $usuario);
      $stmt->bindParam(':senha', $senha);
      $stmt->execute();
      $resultados = $stmt->fetchAll();
      if(count($resultados)){
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        setcookie('usuario', $usuario, time()+60*60*7);
        if (isset($_POST['lembrar'])){
          setcookie('senha', $senha, time()+60*60*7);
        }
        header("location:pag_principal.php");
        die;
      }
      else{
        unset ($_SESSION['usuario']);
        unset ($_SESSION['senha']);
        header('location:login.php');
      }
    }catch(PDOException $e){
      echo "Erro: ". $e->getMessage();
    }
?>
