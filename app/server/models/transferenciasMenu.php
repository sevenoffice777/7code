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

    $jsonData["resposta"] = "undefinedValue";
    $jsonData["msg"] = "Saldo Indisponivel!";
} else {
    $saldoFormatado = converteValorParaReal($saldoUser_nFormatado["saldo"]);
    if ($valorTransferencia > 0) {

        // Verificar se o usuario tem saldo suficiente para realizar a transfer
        if ($valorTransferencia > $saldoFormatado) {
            $jsonData["resposta"] = "undefinedValue";
            $jsonData["msg"] = "Saldo Insuficiente";

        } else {
            // Saldo QUe o usuario tera apos a transação!
            $saldoPosTransferencia = $saldoFormatado - $valorTransferencia;
            //Passo 1 --> Verificar se o account_id_destiny existe
            $consultaContaDestino = prepareAndExecute($conn, "SELECT * FROM bankaccount WHERE account_id = ?", array($dados["account_id_destiny"]), 's', 'selectOne');
            $jsonData["resposta"] = $consultaContaDestino["account_id"];
            // if ($consulaContaDestino) {
            //     // Passo 2 --> Retirar o valor da conta do cliente... ( saldoFormatado - valorTransferencia )
            //     prepareAndExecute($conn, "UPDATE bankaccount SET saldo = ? WHERE account_id = ?", array($saldoPosTransferencia, $_SESSION["account_id"]), 'ii', "upt-update");

            //     // Passo 3 --> Inserir o valorTransferencia no saldo do usuario final (contaDestino)... 



            //     $jsonData["resposta"] = "successTransaction";
            //     $jsonData["msg"] = "SUCESSO";
            // } else {
            //     $jsonData["resposta"] = "undefinedValue";
            //     $jsonData["msg"] = "Conta de Destino não Encontrada!";
            // }
        }
    } else {
        $jsonData["resposta"] = "undefinedValue";
        $jsonData["msg"] = "Valor Para Transferencia Inválido!";
    }

}









echo json_encode($jsonData);