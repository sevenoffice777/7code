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

if ($dados["account_id_destiny"] != $_SESSION["account_id"]) {

    if ($saldoUser_nFormatado["saldo"] == "0.00") {
        $saldoFormatado = 0.00;

        $jsonData["resJSON"] = "undefinedValue";
    } else {
        $saldoFormatado = converteValorParaReal($saldoUser_nFormatado["saldo"]);
        if ($valorTransferencia > 0) {

            // Verificar se o usuario tem saldo suficiente para realizar a transfer
            if ($valorTransferencia > $saldoFormatado) {
                $jsonData["resJSON"] = "undefinedValue";

            } else {
                // Saldo QUe o usuario tera apos a transação!
                $saldoPosTransferencia = $saldoFormatado - $valorTransferencia;
                //Passo 1 --> Verificar se o account_id_destiny existe
                $consultaContaDestino = prepareAndExecute($conn, "SELECT * FROM bankaccount WHERE account_id = ?", array($dados["account_id_destiny"]), 's', 'selectOne');


                if ($consultaContaDestino) {
                    // Passo 2 --> Retirar o valor da conta do cliente... ( saldoFormatado - valorTransferencia )
                    prepareAndExecute($conn, "UPDATE bankaccount SET saldo = ? WHERE account_id = ?", array($saldoPosTransferencia, $_SESSION["account_id"]), 'ii', "upt-update");

                    // Passo 3 --> Adicionar o valor transferido de uma conta pra outra!
                    // Sub-Passo 3 --> Pegar o saldo atual da conta de destino 
                    $saldoAtualDaContaDestino = converteValorParaReal($consultaContaDestino["saldo"]);
                    // Sub-Passo 3 --> Atualiza o saldo atual da conta destino saldo+valorTransferencia
                    $saldoContaDestinoPosTransferencia = $saldoAtualDaContaDestino + $valorTransferencia;
                    // Sub-Passo 3 --> Atualiza no banco de dados o SALDO do clienteDestino
                    prepareAndExecute($conn, "UPDATE bankaccount SET saldo = ? WHERE account_id = ?", array($saldoContaDestinoPosTransferencia, $dados["account_id_destiny"]), 'ii', "upt-update");
                    // Passo 4 --> Inserir as informações dessa transação na tabela historyaccount
                    prepareAndExecute($conn, "INSERT INTO historyaccount(account_id, account_id_destiny, value_transaction, saldo_atual) VALUES(?,?,?,?)", array($_SESSION["account_id"], $dados["account_id_destiny"], $valorTransferencia, $saldoPosTransferencia), "ssss", "opt-insert");
                    $jsonData["resJSON"] = "successTransaction";


                } else {
                    $jsonData["resJSON"] = "undefinedValue";

                }

            }
        } else {
            $jsonData["resJSON"] = "undefinedValue";

        }

    }

} else {
    $jsonData["resJSON"] = "undefinedValue";
}









echo json_encode($jsonData);