<?php

session_start();

require '../services/conn_host.php';
require '../services/prepareAndExecute.php';

$jsonData;

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

function converteValorParaReal($valor)
{

    $valorFormatado = preg_replace("/[^0-9,.]/", "", $valor);

    $valorParaReal = floatval(str_replace(",", ".", $valorFormatado));

    return $valorParaReal;

}

$valorTransferencia = converteValorParaReal($dados["valor_transferencia"]);
// O valor da Transferencia desejado ja esta convertido para numero contavel

$saldoUser_nFormatado = prepareAndExecute($conn, "SELECT saldo FROM bankaccount WHERE account_id = ?", array($_SESSION["account_id"]), "s", "selectOne");


if ($saldoUser_nFormatado["saldo"] == "0.00") {
    $saldoFormatado = 0.00;
} else {
    $saldoFormatado = converteValorParaReal($saldoUser_nFormatado["saldo"]);
    // $jsonData["resposta"] = $saldoFormatado;
    if ($valorTransferencia >= 0) {
        // Verificar se o usuario tem saldo suficiente para realizar a transfer
        if ($valorTransferencia > $saldoFormatado) {
            echo json_encode("Saldo Insuficiente");
        } else {
            $jsonData["resposta"] = "Transação Realizada Com sucesso";
        }

    }
}









echo json_encode($jsonData);