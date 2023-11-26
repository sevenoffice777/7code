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
    <link rel="stylesheet" href="../../styles/servicos-bancarios.css">


    <link rel="stylesheet" media="screen and (max-width: 1050px)"
        href="../../styles/responsive/styles-responsive.css">
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
    <div class="header-responsive h-r-ngtv-pos">
        <div class="nav-responsive">
            <h1> Opção : PIX </h1>
            <span txtValue="saldo">R$ </span>
            <button logout="../../../server/models/logout.php" btn-logout class="logout btn-logout">Log out <ion-icon
                    name="log-out-outline"></ion-icon></button>
        </div>
    </div>
    <header>
        <div class="logo">
            <img src="../../assets/img/logo_crud.png" alt="Logo">
        </div>
        <nav>
            <h1> Opção : PIX </h1>
            <span txtValue="saldo">R$ </span>
            <ion-icon name="log-out-outline" logout="../../../server/models/logout.php" btn-logout
                class="logout-icon"></ion-icon>
        </nav>
        <img src="../../assets/img/menu_hamburguer.png" alt="menu_hamburguer" class="element-none">
    </header>

    <div class="container secondScreen">
        <div class="start_website">

            <div class="left">
                <div class="text">
                    <h1>Seção <b>PIX</b></h1>
                    <p>Aqui você pode fazer um pix para qualquer pessoa do mundo atraves da sua chave <b>CPF</b></p>
                </div>
            </div>
            <div class="right">

            </div>

        </div>
    </div>

    <script>
        document.querySelector('.element-none').addEventListener("click", () => {
            toggleClass(document.querySelector('.header-responsive'), 'h-r-ngtv-pos', 'h-r-pstv-pos');
        });
    </script>
    <script src="../../scripts/functions/functions.js"></script>
    <script src="../../scripts/ajax_requests/ajax.js"></script>
    <script src="../../scripts/ajax_requests/servicos-bancarios-requests/loadingUserData.js"></script>

</body>

</html>