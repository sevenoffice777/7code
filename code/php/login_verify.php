<?php

session_start();

require './conn_host.php';
require './prepare.php';

if (isset($_POST['login_sbmt'])) {

  if (isset($_POST['email']) && isset($_POST['password'])) {

    $emailUser = $_POST['email'];
    $passwordUser = $_POST['password'];


    $queryLogin = 'SELECT * FROM USER WHERE EMAIL = ? ';

    $params_user = array($emailUser);

    $res = prepareAndExecute($conn, $queryLogin, $params_user, "s");
    
    if($res){
      if (password_verify($passwordUser, $res['SENHA'])) {
        $_SESSION['NOME'] = $res['NOME'];

        header("Location: ./sucssesLog.php?statusLogin=sucesso");
      } else {
        $erroLogin = 'E-mail ou Senha Invalidos';
      }
      // Nunca por a merda da barra em passagem de parametro pela url() --> obs: alivia dores de cabeça...
    }else {
      $erroLogin = 'E-mail ou Senha Invalidos';
    }
  } 
}
  
?>