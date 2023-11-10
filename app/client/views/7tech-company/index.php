<?php 
    session_start() 
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 7TECH - BEM-VINDO
        <?php echo $_SESSION["USER"]["NOME"] ?>
    </title>

    <!-- css -->
    <link rel="stylesheet" href="../../styles/style.css">
    <!-- response -->
    <link rel="stylesheet" media="screen and (max-width: 950px)" href="../../styles/responsive/styles-responsive.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="../../assets/img/logo_crud.png" type="image/x-icon">

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
                        <?php
                        echo $_SESSION["USER"]["NAME"];
                        ?>
                    </span>
                    <img src="../../assets/img/user-picture.png" name="user-picture" alt="user-pictuer">
                </div>
                <div class="user-data-div-container">
                    <div class="user-data-div">
                        <img src="../../assets/img/user-picture.png" name="user-picture" alt="user-pictuer">
                        <div class="user-data-info">
                            <span class="username">
                                <?php
                                echo $_SESSION["USER"]["NOME"];
                                ?>
                            </span>
                            <span class="useremail">
                                <?php
                                echo $_SESSION["USER"]["EMAIL"];
                                ?>
                            </span>
                            <span class="usersaldo">
                                <?php
                                echo $_SESSION["USER"]["SALDO"];
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <ion-icon name="log-out-outline" id="logout-icon"></ion-icon>
        </div>
    </header>

    <div class="container user-area-screen">
        <div class="start_website">

        </div>
    </div>
</body>

</html>