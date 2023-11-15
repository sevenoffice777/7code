<?php session_start() ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>

    <!-- css -->
    <link rel="stylesheet" href="../../styles/style.css">
    <!-- response -->
    <link rel="stylesheet" media="screen and (max-width: 950px)"
        href="../../styles/responsive/styles-responsive-tablets.css">
    <link rel="stylesheet" media="screen and (max-width: 550px)"
        href="../../styles/responsive/styles-responsive-smartphones.css">
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
    <div class="user-data-card display_none">
        <img src="../../assets/img/user-picture.png" alt="photo-user" class="photo-user">
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
        <button logout="../../../server/models/logout.php" class="logout btn-logout">Log out <ion-icon
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


    <script src="../../scripts/ajax_requests/ajax.js"></script>
    <script src="../../scripts/ajax_requests/datauser_request.js"></script>
    <script src="../../scripts/ajax_requests/logout_request.js"></script>
    <script src="../../scripts/functions/functions.js"></script>

    <script>
        
        
        //  O evento abaixo e focado pra clique fora de qualquer div, por exemplo, clicando fora do card ele desaparece;
        document.querySelector('.container').addEventListener('click', () => {
            if (!document.querySelector('.user-data-card').classList.contains('display_none')) {
                toggleClass(document.querySelector('.user-data-card'), 'display_none')
            }
        })

    </script>
</body>

</html>