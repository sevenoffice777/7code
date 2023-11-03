<?php
require './conn_host.php';
require './prepare.php';

$erro = false;

if (isset($_POST['signup_sbmt'])) {
  $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

  $msg = 'Dados Informados Incorretamente ( ';

  if (!isset($data['name']) || empty($data['name'])) {
    $erro = true;
    $msg .= 'Nome, ';
    // para concatenar usa-se .=
  }

  if (!isset($data['dt_nasc']) || empty($data['dt_nasc'])) {
    $erro = true;
    $msg .= 'Data De Nascimento, ';
  } else {
    $dateTime = DateTime::createFromFormat('Y-m-d', $data['dt_nasc']);

    if (!$dateTime) {
      $erro = true;
      $msg .= 'Data De Nascimento';
    }
  }
  if (!isset($data['email']) || empty($data['email'])) {
    $erro = true;
    $msg .= 'Email, ';
  } else {
    $queryLogin = 'SELECT EMAIL FROM USER WHERE EMAIL = ?';

    $params_user = array($data['email']);

    $res = prepareAndExecute($conn, $queryLogin, $params_user, "s");

    if ($res) {
      $erro = true;
      $msg .= 'Email[Já existe], ';
    }

  }

  if (!isset($data['password']) || empty($data['password'])) {
    $erro = true;
    $msg .= 'Senha, ';
  }

  $msg = substr($msg, 0, -2);
  $msg .= ' )';

  if (!$erro) {


    //todos os dados que vieram com o methodo post;
    $senha_hash = password_hash($data['password'], PASSWORD_DEFAULT);
    // criptografia do $data['password'];

    $querySql = 'CALL INSERT_USER(?,?,?,?)';

    $stmt = $conn->prepare($querySql);

    $stmt->bind_param("ssss", $data['name'], $data['email'], $data['dt_nasc'], $senha_hash);

    if ($stmt->execute()) {
      header("location: ./sucssesLog.php?statusSignup=sucesso");
    }
  }
}



?>