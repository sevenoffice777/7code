<?php

require '../services/conn_host.php';
require '../services/prepareAndExecute.php';

session_start();


$jsonData;

// PRIMEIRO --> pegar as linhas do extrato e seus lançamentos

$rowsHistory = prepareAndExecute($conn, "SELECT * FROM historyaccount WHERE account_id = ?", array($_SESSION['account_id']), "s", "selectAll");

// SEGUNDO --> relacionar os accounts_ids com nome de usuario;

if ($rowsHistory != null) {
    foreach ($rowsHistory as $row) {
        $getCPF_KEY = prepareAndExecute($conn, "SELECT cpf FROM bankaccount WHERE account_id = ?", array($row['account_id_destiny']), "s", "selectOne");

        $cpf = $getCPF_KEY['cpf'];

        $getUsername = prepareAndExecute($conn, "SELECT nome FROM user WHERE cpf = ?", array($cpf), "i", "selectOne");

        $userName = $getUsername['nome'];

        $jsonData['rows'][] = array(
            "data" => $row['data_operation'],
            "value_transaction" => $row['value_transaction'],
            "saldo_atual" => $row['saldo_atual'],
            "nome_do_usuario_de_destino" => $userName
        );
    }
} else{
    $jsonData['rows'] = "rowsNotFound";
}


echo json_encode($jsonData);




