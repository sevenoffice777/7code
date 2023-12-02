<?php

require '../services/conn_host.php';
require '../services/prepareAndExecute.php';

session_start();

$jsonData;

// Obtém o nome temporário do arquivo
$nomeTemporario = $_FILES['file']['tmp_name'];

// Diretório de destino
$diretorioDestino = '../../client/uploads/';

// Valida e sanitiza o CPF antes de usá-lo
$cpfUsuario = filter_var($_SESSION['CPF'], FILTER_SANITIZE_NUMBER_INT);

// Caminho completo de destino (incluindo o nome do arquivo)
$caminhoParaCadaUsuario = $diretorioDestino . $cpfUsuario;

// Cria o diretório (se não existir)
if (!file_exists($caminhoParaCadaUsuario)) {
    mkdir($caminhoParaCadaUsuario, 0777, true);
}

// Verifica quantos arquivos "profile" existem na pasta do usuário
$arquivosProfile = glob($caminhoParaCadaUsuario . '/profile.*');
$numArquivosProfile = count($arquivosProfile); // valor inteiro
$srcExists = false;

if ($numArquivosProfile > 0) {
    // Exclui o arquivo existente
    unlink($arquivosProfile[0]);

    // Atualiza o caminho na tabela USERPHOTO
    $novoCaminhoDestinoParaSQL = $cpfUsuario . '/' . 'profile.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    prepareAndExecute(
        $conn,
        'UPDATE userphoto SET caminho = ? WHERE cpf = ?',
        array($novoCaminhoDestinoParaSQL, $cpfUsuario),
        "ss",
        "opt-update"
    );
    $srcExists = true;
    
} else {
    $novoCaminhoDestinoParaSQL = $cpfUsuario . '/' . 'profile.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
}

// Move o arquivo para o diretório de destino
$caminhoCompletoDestino = $caminhoParaCadaUsuario . '/' . 'profile.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
if (move_uploaded_file($nomeTemporario, $caminhoCompletoDestino)) {
    if($srcExists == false) {
        prepareAndExecute(
            $conn,
            'INSERT INTO userphoto(caminho, cpf) VALUES(?,?)',
            array($novoCaminhoDestinoParaSQL, $cpfUsuario),
            "ss",
            "opt-insert"
        );
    }
    $jsonData = ["msg" => "Sucesso"];
} else {
    $jsonData = ["msg" => "Erro"];
}

echo json_encode($jsonData);
?>
