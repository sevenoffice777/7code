<?php
require '../services/conn_host.php';
require '../services/prepareAndExecute.php';

session_start();

$erro = false;
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$msg = 'Dados Incorretos ( ';

// Numero Aleatorio da Conta


if($_SESSION['tokenUser'] == $data['tokenUser']) {
  
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
  $dateMin = date('Y-m-d', strtotime('-18 years'));
  $dateMax = date('Y-m-d', strtotime('-100 years'));

  if (!$dateTime) {
    $msg .= "Formato Invalido de Data";
    $erro = true;
  }

  if ($data['dt_nasc'] > $dateMin) {
    $msg .= "Idade Minima 18 anos, ";
    $erro = true;
  }

  if ($data['dt_nasc'] < $dateMax) {
    $msg .= "Idade Maxima 100 anos, ";
    $erro = true;
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
} else {
  $resRegex = preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{5,}$/', $data['password']);
  if (!$resRegex) {
    $erro = true;
    $msg .= 'Por Favor, A senha deve ter pelo menos uma letra maiuscula, uma minuscula, um numero, e no minimo 5 caracteres ,';
  }
}
$msg = substr($msg, 0, -2);
$msg .= ' )';

if (!$erro) {
  //todos os dados que vieram com o methodo post;
  $senha_hash = password_hash($data['password'], PASSWORD_DEFAULT);
  // criptografia do $data['password'];

  $querySql = 'CALL INSERT_USER(?,?,?,?)';

  $stmt = $conn->prepare($querySql);

  $stmt->bind_param("ssss", $data['name'], $data['email'],$data['dt_nasc'],$senha_hash);

  if ($stmt->execute()) {
    $jsonData = ["url" => "../views/successLog.php?statusSignup=sucesso"];
  }
} else {
  $jsonData = ["msg_erro" => $msg];
}


} else {
  $jsonData = ["msg_erro" => $msg];
}

echo json_encode($jsonData);