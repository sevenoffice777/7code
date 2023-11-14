<?php session_start() ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 7TECH - </title>

    <!-- css -->
    <link rel="stylesheet" href="../../styles/style.css">
    <!-- response -->
    <link rel="stylesheet" media="screen and (max-width: 950px)" href="../../styles/responsive/styles-responsive-tablets.css">
    <link rel="stylesheet" media="screen and (max-width: 550px)" href="../../styles/responsive/styles-responsive-smartphones.css">
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
    <header>
        <div class="logo">
            <img src="../../assets/img/logo_crud.png" alt="Logo">
        </div>
        <div class="user-picture">
            <div class="user-picture user-data">
                <div class="user-data-container">
                    <span name="username">
                        
                    </span>
                    <img src="../../assets/img/user-picture.png" name="user-picture" alt="user-pictuer">
                </div>
            </div>
            <ion-icon name="log-out-outline" logout="../../../server/models/logout.php" class="logout-icon"></ion-icon>
        </div>
    </header>

    <div class="container user-area-screen">
        <div class="start_website">

        </div>
    </div>
    <script src="../../scripts/ajax_requests/ajax.js"></script>
</body>

</html>