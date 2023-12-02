<?php

require '../services/conn_host.php';
require '../services/prepareAndExecute.php';

session_start();

$jsonData = array();
$userRow = prepareAndExecute($conn, 'SELECT nome,email FROM railway.user WHERE CPF = ?', array($_SESSION['CPF']), 's');
$accountBankRow = prepareAndExecute($conn, 'SELECT account_id, saldo, num_card FROM railway.bankaccount WHERE cpf = ?', array($_SESSION['CPF']), 's');
$caminhoPhoto = prepareAndExecute($conn, 'SELECT caminho FROM userphoto WHERE cpf = ?', array($_SESSION['CPF']), 's');
    $jsonData['userAccount'] = $userRow;
    $jsonData['bankAccount'] = $accountBankRow;
    if($caminhoPhoto) {
        
        $jsonData['caminhoPhoto'] = $caminhoPhoto['caminho'];

    } else {
        $jsonData['caminhoPhoto'] = 'default/user-picture.png';

    }

echo json_encode($jsonData);
