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
    <link rel="stylesheet" media="screen and (max-width: 950px)" href="../../styles/responsive/styles-responsive.css">

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

    <!-- Card Upload -->
    <div class="card-default-centerscreen display_none">
        <div class="left-card-default-centerscreen">
            <h1>Meu Perfil</h1>
            <span>Faça upload da sua foto para 7Code</span>
        </div>
        <div class="right-card-default-centerscreen">
            <img src="../../assets/img/edit.png" alt="imgUploadPhoto" id="uploadPhoto">
            <input type="file" name="uploadPhotoInput" id="uploadPhotoInput" class="display_none"><br>
            <button id="btn-upload" upload-photo="../../../server/models/uploadPhoto.php">CADASTRAR</button>
        </div>
    </div>

    <!-- Card Upload -->
    <div class="user-data-card display_none">
        <div class="photo-user">
            <img src="" alt="photo-user" class="photo-user">
            <img src="../../assets/img/edit.png" alt="edit" class="overlay-edit-photo" id="btn-photo-edit">
        </div>
        <div class="user-data-info">
            <div class="data-user-campo">
                <span class="realce-span">Nº Conta: </span>
                <span txtValue="accountNumber"> </span>
            </div>
            <div class="data-user-campo">
                <span class="realce-span">Nome de Usuario: </span>
                <span txtValue="username"> </span>
            </div>
            <div class="data-user-campo">
                <span class="realce-span">Email: </span>
                <span txtValue="email"> </span>
            </div>
        </div>
        <span txtValue="saldo">R$ </span>
        <button logout="../../../server/models/logout.php" btn-logout class="logout btn-logout">Log out <ion-icon
                name="log-out-outline"></ion-icon></button>
    </div>


    <!-- RESPONSIVE HEADER -->

    <div class="header-responsive-7code h-r-ngtv-pos">
        <div class="nav-responsive-7code">
            <div class="user-data-container">
                <img src="" name="user-picture" alt="user-pictuer" class="photo-user">
                <span txtValue="username"></span>
            </div>
            <span txtValue="saldo">R$ </span>
            <button logout="../../../server/models/logout.php" btn-logout class="logout btn-logout">Log out <ion-icon
                    name="log-out-outline"></ion-icon></button>
        </div>
    </div>


    <!-- "BODY" -->

    <header>
        <div class="logo">
            <img src="../../assets/img/logo_crud.png" alt="Logo">
        </div>

        <nav>
            <div class="user-picture">
                <span txtValue="saldo">Saldo : R$ </span>
                <div class="user-data-container">
                    <span txtValue="username"></span>
                    <img src="" name="user-picture" alt="user-pictuer" class="photo-user">
                </div>
                <ion-icon name="log-out-outline" logout="../../../server/models/logout.php" btn-logout
                    class="logout-icon"></ion-icon>
            </div>
        </nav>
        <ion-icon name="menu-outline" class="element-none"></ion-icon>

    </header>

    <div class="container user-screen">
        <div class="start_website">
        </div>
    </div>


    <script>
        document.querySelector('.element-none').addEventListener("click", () => {
            toggleClass(document.querySelector('.header-responsive-7code'), 'h-r-ngtv-pos', 'h-r-pstv-pos');
            if (!document.querySelector('.card-default-centerscreen').classList.contains('display_none') && document.querySelector('.user-data-card').classList.contains('display_none')) {
                toggleClass(document.querySelector('.card-default-centerscreen'), 'display_none')

            }
            if (document.querySelector('.card-default-centerscreen').classList.contains('display_none') && !document.querySelector('.user-data-card').classList.contains('display_none')) {
                toggleClass(document.querySelector('.user-data-card'), 'display_none')

            }
        });
    </script>

    <!-- Scripts -->
    <script src="../../scripts/functions/7code-main.js"></script>
    <script src="../../scripts/functions/functions.js"></script>
    <script src="../../scripts/ajax_requests/ajax.js"></script>
    <script src="../../scripts/ajax_requests/7code_request.js"></script>

</body>

</html>