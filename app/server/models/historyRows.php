<?php

require '../services/conn_host.php';
require '../services/prepareAndExecute.php';

session_start();


$jsonData;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $requestType = $POST["requestType"];

    if($requestType == "GET_ROWSHISTORY") {
        $historyRows = prepareAndExecute($conn, "SELECT data_operation, account_id_destiny, value_transaction, saldo_atual FROM historyaccount WHERE account_id = ?", array($_SESSION['account_id']), 's', 'selectAll');        
        $jsonData['linhas'] = $historyRows;
    }

    
 }



echo json_encode($jsonData);




