<?php session_start() ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 7TECH - <?php echo $_SESSION["NOME"] ?> </title>
    
    <!-- css -->
    <link rel="stylesheet" href="../../styles/style.css">
    <!-- response -->
    <link rel="stylesheet" media="screen and (max-width: 950px)" href="../../styles/responsive/styles-responsive.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="../../assets/img/logo_crud.png" type="image/x-icon">
</head>
<body>
    <header>
        <div class="logo">
            <img src="../../assets/img/logo_crud.png" alt="Logo">
        </div>
        <div class="user-picture">
            <span name="username">
                <?php 
                   echo $_SESSION["NOME"];
                ?>
            </span>
            <img src="#" name="user-picture" alt="user-pictuer">
        </div>
    </header>
</body>
</html>