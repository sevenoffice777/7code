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
$numArquivosProfile = count($arquivosProfile);


if ($numArquivosProfile < 1) {
    // Obtém a extensão do arquivo original
    $extensao = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    // Novo nome do arquivo
    $novoNomeDoArquivo = 'profile.' . $extensao;

    $caminhoCompletoDestino = $caminhoParaCadaUsuario . '/' . $novoNomeDoArquivo;
    $caminhoDestinoParaSQL = $cpfUsuario . '/' . $novoNomeDoArquivo;

    // Move o arquivo para o diretório de destino
    if (move_uploaded_file($nomeTemporario, $caminhoCompletoDestino)) {
        prepareAndExecute(
            $conn,
            'INSERT INTO USERPHOTO(CAMINHO, CPF) VALUES(?,?)',
            array($caminhoDestinoParaSQL, intval($cpfUsuario)),
            "si",
            "opt-insert"
        );
        $jsonData = ["msg" => "Sucesso"];
    } else {
        $jsonData = ["msg" => "Erro"];
    }
} else {
    $jsonData = ["msg" => "Você já tem um arquivo 'profile' na pasta."];
}

echo json_encode($jsonData);
?>
