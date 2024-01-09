<?php

require '../services/conn_host.php';
require '../services/prepareAndExecute.php';

$jsonData;

$jsonData;

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

function converteValorParaReal($valor) {
    $valorFormatado = preg_replace("/[^0-9,.]/", "", $valor);

    $valorParaReal = floatval(str_replace(",",".", $valorFormatado));
    
    return $valorParaReal;
}

$valorTransferencia = converteValorParaReal($dados["valor_transferencia"]);

// PESQUISAR O SALDO DO USUARIO PARA COMPARAR COM O VALOR DA TRANSFERENCIA
if ($valorTransferencia <= 0){

    $jsonData["response_erro"] = "undefinedValue";
}







echo json_encode($jsonData);