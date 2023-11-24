<?php

require '../services/conn_host.php';
require '../services/prepareAndExecute.php';

session_start();

$jsonData = array();
$userRow = prepareAndExecute($conn, 'SELECT NOME,EMAIL FROM USER WHERE CPF = ?', array($_SESSION['CPF']), 's');
$accountBankRow = prepareAndExecute($conn, 'SELECT ACCOUNT_ID, SALDO, NUM_CARD FROM BANKACCOUNT WHERE CPF = ?', array($_SESSION['CPF']), 's');
$caminhoPhoto = prepareAndExecute($conn, 'SELECT CAMINHO FROM USERPHOTO WHERE CPF = ?', array($_SESSION['CPF']), 's');

    $jsonData['userAccount'] = $userRow;
    $jsonData['bankAccount'] = $accountBankRow;
    if($caminhoPhoto) {
        
        $jsonData['caminhoPhoto'] = $caminhoPhoto['CAMINHO'];

    } else {
        $jsonData['caminhoPhoto'] = 'default/user-picture.png';

    }

echo json_encode($jsonData);
