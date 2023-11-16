<?php 

    function prepareAndExecute($conn, $querySQL, $params, $types, $crud = null) 
    {
        if (!$conn) {
            return false;
        }
        
        $stmt = $conn->prepare($querySQL); // Preparamos a string da querySQL  
        $stmt->bind_param($types, ...$params); // DIZEMOS QUAIS OS DADOS Q SERAO SUBSTITUIDOS
        $stmt->execute();

        if($crud == null) {
            $resultado = $stmt->get_result()->fetch_assoc(); 
            return $resultado;
        }
    }

?>