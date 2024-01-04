<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testador de Caracteres</title>
</head>
<body>
    <input type="text" id="input_teste">

    <div class="box">
        <h1>Response</h1>
        <p>Response : <span id="responseTest"></span></p>
    </div>
    <script>
        var input = document.getElementById("input_teste");
        var response = document.getElementById("responseTest");
        input.addEventListener("input", (e)=>{
            let valorAtual = e.target.value;
            response.textContent =valorAtual + ' ';

            // Continuar testando o input pra prevenir que o usuario digite dados errados
            
            
        })
    </script>
</body>
</html>