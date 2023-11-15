<?php session_start() ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>

    <!-- css -->
    <link rel="stylesheet" href="../../styles/geral.css">
    <!-- response -->
    <link rel="stylesheet" media="screen and (max-width: 950px)"
        href="../../styles/responsive/styles-responsive-tablets.css">
    <link rel="stylesheet" media="screen and (max-width: 550px)"
        href="../../styles/responsive/styles-responsive-smartphones.css">
    <link rel="stylesheet" href="../../styles/7code.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="../../assets/img/logo_crud.png" type="image/x-icon">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- ion-icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <div class="card-default-centerscreen display_none">
        <div class="left-card-default-centerscreen">
            <h1>Meu Perfil</h1>
            <span>Faça upload da sua foto para 7Code</span>
        </div>
        <div class="right-card-default-centerscreen">
            <img src="../../assets/img/edit.png" alt="imgUploadPhoto" class="photo-user" id="uploadPhoto">
            <input type="file" name="uploadPhotoInput" id="uploadPhotoInput" class="display_none"><br>
            <button id="btn-upload" upload-photo="../../../server/models/uploadPhoto.php">CADASTRAR</button>
        </div>
    </div>
    <div class="user-data-card display_none">
        <div class="photo-user" >
            <img src="../../assets/img/user-picture.png" alt="photo-user" class="photo-user">
            <img src="../../assets/img/edit.png" alt="edit" class="overlay-edit-photo" id="btn-photo-edit">
        </div>
        <div class="user-data-info">
            <div class="data-user-campo">
                <span class="realce-span">Nº Conta: </span>
                <span name="accountNumber"> </span>
            </div>
            <div class="data-user-campo">
                <span class="realce-span">Nome de Usuario: </span>
                <span name="username"> </span>
            </div>
            <div class="data-user-campo">
                <span class="realce-span">Email: </span>
                <span name="email"> </span>
            </div>
        </div>
        <span name="saldo">R$ </span>
        <button logout="../../../server/models/logout.php" btn-logout class="logout btn-logout">Log out <ion-icon
                name="log-out-outline"></ion-icon></button>
    </div>
    <header>
        <div class="logo">
            <img src="../../assets/img/logo_crud.png" alt="Logo">
        </div>
        <div class="user-picture">
            <div class="user-data-container">
                <span name="username"></span>
                <img src="../../assets/img/user-picture.png" name="user-picture" alt="user-pictuer">
            </div>
            <ion-icon name="log-out-outline" logout="../../../server/models/logout.php" btn-logout
                class="logout-icon"></ion-icon>
        </div>
    </header>
    <div class="container">
        <div class="container user-area-screen">
            <div class="start_website">
            </div>
        </div>
    </div>


    <script>

        document.querySelector('#uploadPhoto').addEventListener('click', () => {
            // Aciona o clique no input de arquivo
            document.querySelector('#uploadPhotoInput').click();
        });

        // Adiciona um ouvinte de evento ao input de arquivo para lidar com a seleção do arquivo
        document.querySelector('#uploadPhotoInput').addEventListener('change', () => {
            // Verifica se um arquivo foi selecionado
            if (document.querySelector('#uploadPhotoInput').files[0]) {
                // Atualiza a src da imagem para '../../assets/img/success.png'
                document.querySelector('#uploadPhoto').src = '../../assets/img/success.png';
            }
        });

        document.querySelector('.user-data-container').addEventListener("click", () => {
            if (document.querySelector('.card-default-centerscreen').classList.contains('display_none')) {
                toggleClass(document.querySelector('.user-data-card'), 'display_none')
            }
        })
        
        document.querySelector('#btn-photo-edit').addEventListener('click', ()=>{
            toggleClass(document.querySelector('.user-data-card'), 'display_none')
            toggleClass(document.querySelector('.card-default-centerscreen'), 'display_none')

        })

        //  O evento abaixo e focado pra clique fora de qualquer div, por exemplo, clicando fora do card ele desaparece;
        document.querySelector('.container').addEventListener("click", () => {
            if (!document.querySelector('.user-data-card').classList.contains('display_none')) {
                toggleClass(document.querySelector('.user-data-card'), 'display_none')
            }
            if (!document.querySelector('.card-default-centerscreen').classList.contains('display_none')) {
                toggleClass(document.querySelector('.card-default-centerscreen'), 'display_none')
            }
            
        })




    </script>
    <script src="../../scripts/functions/functions.js"></script>
    <script src="../../scripts/ajax_requests/ajax.js"></script>
    <script src="../../scripts/ajax_requests/7code_request.js"></script>

</body>

</html>