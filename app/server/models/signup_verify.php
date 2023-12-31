<?php
require '../services/conn_host.php';
require '../services/prepareAndExecute.php';

function validarCPF($cpf)
{
  // Remover caracteres não numéricos
  $cpf = preg_replace('/[^0-9]/', '', $cpf);

  // Verificar se o CPF tem 11 dígitos

  // Calcular o primeiro dígito verificador
  $soma = 0;
  for ($i = 0; $i < 9; $i++) {
    $soma += ($cpf[$i] * (10 - $i));
  }
  $resto = $soma % 11;
  $digito1 = ($resto < 2) ? 0 : 11 - $resto;

  // Calcular o segundo dígito verificador
  $soma = 0;
  for ($i = 0; $i < 10; $i++) {
    $soma += ($cpf[$i] * (11 - $i));
  }
  $resto = $soma % 11;
  $digito2 = ($resto < 2) ? 0 : 11 - $resto;

  // Verificar se os dígitos verificadores estão corretos
  if (($cpf[9] != $digito1) || ($cpf[10] != $digito2)) {
    return false;
  } else {
    return true;
  }
}

// Exemplo de uso

session_start();

$erro = false;
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$msg = 'Dados Incorretos ( ';

// Numero Aleatorio da Conta


if ($_SESSION['tokenUser'] == $data['tokenUser']) {

  if (!isset($data['name']) || empty($data['name'])) {
    $erro = true;
    $msg .= 'Nome é obrigatório, ';
  } else if (strlen($data['name']) > 15) {
    $erro = true;
    $msg .= 'O nome deve ter no máximo 10 caracteres, ';
  }

  if (!isset($data['dt_nasc']) || empty($data['dt_nasc'])) {
    $erro = true;
    $msg .= 'Data De Nascimento, ';
  } else {
    $dateTime = DateTime::createFromFormat('Y-m-d', $data['dt_nasc']);
    $dateMin = date('Y-m-d', strtotime('-16 years'));
    $dateMax = date('Y-m-d', strtotime('-100 years'));

    if (!$dateTime) {
      $msg .= "Formato Invalido de Data";
      $erro = true;
    }

    if ($data['dt_nasc'] > $dateMin) {
      $msg .= "Idade Minima 16 anos, ";
      $erro = true;
    }

    if ($data['dt_nasc'] < $dateMax) {
      $msg .= "Limite de idade excedido!";
      $erro = true;
    }
  }

  if (!isset($data['email']) || empty($data['email'])) {
    $erro = true;
    $msg .= 'Email, ';

  } else {
    $queryLogin = 'SELECT EMAIL FROM `user` WHERE EMAIL = ?';

    $params_user = array($data['email']);

    $res = prepareAndExecute($conn, $queryLogin, $params_user, "s", "selectOne");

    if ($res) {
      $erro = true;
      $msg .= 'Email[Já existe], ';
    }

  }

  if (!isset($data['CPF']) || empty($data['CPF'])) {
    $erro = true;
    $msg .= 'CPF, ';
  } else if (strlen($data['CPF']) != 11 || preg_match('/(\d)\1{10}/', $data['CPF']) || !validarCPF($data['CPF'])) {
    $queryCPF = 'SELECT CPF FROM `user` WHERE CPF = ?';
    $params_cpf = array($data['CPF']);
    $res = prepareAndExecute($conn, $queryCPF, $params_cpf, 'i', 'selectOne');
    if($res < 1) {
      $erro = true;
      $msg .= 'CPF INVALIDO, ';
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

  if ($erro == false) {
    $senha_hash = password_hash($data['password'], PASSWORD_DEFAULT);
    $resInsert = prepareAndExecute($conn, 'CALL INSERT_USER(?,?,?,?,?)', array(intval($data['CPF']), $data['name'], $data['email'], $data['dt_nasc'], $senha_hash), 'issss', 'opt-insert');
    if ($resInsert) {
      $jsonData = ["url" => "../views/successLog.php?statusSignup=sucesso"];
    }
  } else {
    $jsonData = ["msg_erro" => $msg];
  }

} else {
  $jsonData = ["msg_erro" => 'Erro no servidor '];
}

echo json_encode($jsonData);