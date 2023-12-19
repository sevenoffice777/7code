<?php

function prepareAndExecute($conn, $querySQL, $params, $types, $crud = null)
{
    if (!$conn) {
        return false;
    }

    $stmt = $conn->prepare($querySQL); // Preparamos a string da querySQL  
    $stmt->bind_param($types, ...$params); // DIZEMOS QUAIS OS DADOS Q SERAO SUBSTITUIDOS

    if ($stmt->execute()) {
        if ($crud == 'selectOne') {
            $resultado = $stmt->get_result()->fetch_assoc();
            return $resultado;
        }

        if ($crud == 'selectAll') {
            $resultado = array();
        
            $result = $stmt->get_result();
            
            while ($row = $result->fetch_assoc()) {
                $resultado[] = $row;
            }
        
            return $resultado;
        }
        


        return true;

    } else {
        return false;
    }

}

?>