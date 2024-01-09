<?php

session_start();

require '../services/conn_host.php';
require '../services/prepareAndExecute.php';

$jsonData;

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

function converteValorParaReal($valor) {
    
        $valorFormatado = preg_replace("/[^0-9,.]/", "", $valor);

        $valorParaReal = floatval(str_replace(",",".", $valorFormatado));
    
        return $valorParaReal;
        
}

$valorTransferencia = converteValorParaReal($dados["valor_transferencia"]);

$saldoUser_nFormatado = prepareAndExecute($conn, "SELECT saldo FROM bankaccount WHERE account_id = ?", array($_SESSION["account_id"]), "s", "selectOne");

if($saldoUser_nFormatado["saldo"] == "0.00") {
    $saldoFormatado = 0;
} 
else{
    $saldoFormatado = $saldoUser_nFormatado;
}

if ($valorTransferencia <= 0 or $valorTransferencia > $saldoFormatado){

    $jsonData["response_erro"] = "undefinedValue";
} else {
    //  CONTINUA POR AQUI...
}

// $jsonData["valueTest"] = ;







echo json_encode($jsonData);