<?php

require '../services/conn_host.php';
require '../services/prepareAndExecute.php';

session_start();

$jsonData = array();
$userRow = prepareAndExecute($conn, 'SELECT nome,email FROM user WHERE CPF = ?', array($_SESSION['CPF']), 's','selectOne');
$accountBankRow = prepareAndExecute($conn, 'SELECT account_id, saldo, num_card FROM bankaccount WHERE cpf = ?', array($_SESSION['CPF']), 's','selectOne');
$_SESSION['account_id'] = $accountBankRow['account_id'];
    // Get all the data of the user's friends and add it to an associative array

$caminhoPhoto = prepareAndExecute($conn, 'SELECT caminho FROM userphoto WHERE cpf = ?', array($_SESSION['CPF']), 's','selectOne');
    $jsonData['userAccount'] = $userRow;
    $jsonData['bankAccount'] = $accountBankRow;
    if($caminhoPhoto) {
        
        $jsonData['caminhoPhoto'] = $caminhoPhoto['caminho'];

    } else {
        $jsonData['caminhoPhoto'] = 'default/user-picture.png';

    }

echo json_encode($jsonData);
