<?php

session_start();

require '../services/conn_host.php';
require '../services/prepareAndExecute.php';


if (isset($_POST['email']) && isset($_POST['password'])) {

  $emailUser = $_POST['email'];
  $passwordUser = $_POST['password'];


  $queryLogin = 'SELECT * FROM USER WHERE EMAIL = ? ';

  $params_user = array($emailUser);

  $res = prepareAndExecute($conn, $queryLogin, $params_user, "s");

  if ($res) {
    if (password_verify($passwordUser, $res['SENHA'])) {
      $_SESSION['ID_USER'] = $res['ID_USER'];


      $jsonData = ["url" => "../views/successLog.php?statusLogin=sucesso"];
    } else {
      $jsonData = ["msg_erro" => "E-mail ou senha Invalidos"];
    }
    // Nunca por a merda da barra em passagem de parametro pela url() --> obs: alivia dores de cabeça...
  } else {
    $jsonData = ["msg_erro" => "E-mail ou senha Invalidos"];
  }
}

echo json_encode($jsonData);

?>