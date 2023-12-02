<?php 
     define('DB_HOST', 'db.tacylyzccwclcdiivhpj.supabase.co');
     define('DB_USER', 'postgres');
     define('DB_PASSWORD', '83J7~En+ZmTUXfx'); // Substitua [YOUR-PASSWORD] pela senha real
     define('DB_NAME', 'postgres');
     define('DB_PORT', 5432);

     // Conectar usando pgsql ao invés de mysqli
     $conn = pg_connect("host=" . DB_HOST . " port=" . DB_PORT . " dbname=" . DB_NAME . " user=" . DB_USER . " password=" . DB_PASSWORD);

     if ($conn) {
         echo "<script>console.log('Conexão bem-sucedida!')</script>";
     }


?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tester</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        [type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        [type="submit"]:hover {
            background-color: #45a049;
        }

        .result-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: left;
            width: 300px;
            /* Ajuste a largura conforme necessário */
            margin-top: 20px;
        }

        .left,
        .right {
            width: 50vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid black;
        }

        #res {
            width: 90%;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 10px;
            height: 100px;
            border-radius: 5px;

        }
    </style>
</head>

<body>
    <div class="left">
        <form action="" method="post">
            <h1>My Tester APP</h1>
            <label for="command">Valor de Teste:</label>
            <input type="text" id="command" name="command" required>
            <input type="submit" name="btn_sbmt" placeholder="Verificar"></input>
        </form>
    </div>
    <div class="right">
        <div class="result-card">
            <h2>Resultado do Teste</h2>
            <p id="res">Comando executado:
                <br>
                <?php
                // Backend
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['btn_sbmt'])) {
                        $user = $_POST['command'];

                        $querySQL = "INSERT INTO public.userData(nome, email) values('samuel', 'samuel@gmail.com')";                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
                        $resConnect = pg_query($conn, $querySQL);

                        echo $resConnect;

                        
                        
                        
                        



                    }

                }
                ?>

            </p>
        </div>
    </div>


</body>

</html>