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
    <link rel="stylesheet" href="../../styles/servicos-bancarios.css">

    <link rel="stylesheet" media="screen and (max-width: 1050px)" href="../../styles/responsive/styles-responsive.css">
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

    <!-- Header - responsive -->
    <div class="header-responsive h-r-ngtv-pos">
        <div class="nav-responsive">
            <div class="user-data-container">
                <img src="" name="user-picture" alt="user-pictuer" class="photo-user">
                <span txtValue="username"></span>
            </div>
            <span txtValue="saldo">R$ </span>
            <button logout="../../../server/models/logout.php" btn-logout class="logout btn-logout">Log out <ion-icon
                    name="log-out-outline"></ion-icon></button>
        </div>
    </div>

    <header>
        <div class="logo">
            <img src="../../assets/img/logo_crud.png" alt="Logo">
        </div>
        <ion-icon name="home" onclick="irPara_localWindow('../7tech-company/index.php')"></ion-icon>
        <nav>
            <div class="user-picture">
                <span txtValue="saldo">R$ </span>
                <ion-icon name="log-out-outline" logout="../../../server/models/logout.php" btn-logout
                    class="logout-icon"></ion-icon>
            </div>
        </nav>
        <img src="../../assets/img/menu_hamburguer.png" alt="menu_hamburguer" class="element-none">
    </header>

    <div class="container secondScreen">
        <div class="apr_container">
            <h1>Menu De Extratos</h1>
            <p>Aqui você pode ver seus <b>gastos recentes</b></p>
        </div>
        <div class="start_website">
            <div class="container_extratos_card">
                <h1>Ultimos Lançamentos</h1>
                <div class="container-transaction-table">
                    <table class="transaction-table">
                        <thead id="head_table">
                            <tr>
                                <th>Data</th> 
                                <th>Conta de Destino</th>
                                <th>Valor da Transação</th>
                                <th>Saldo Atual</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_add_transactions">
                            <tr>
                                <th>12/12/2023</th>
                                <th>03453456 - João de Almeida</th>
                                <th>123,00</th>
                                <th>2500,00</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <footer>
    <div class="columns">
      <div class="column">
        <div class="logo">
          <img src="../../assets/img/logo_crud.png" alt="logo">
        </div>
        <span> 7Code Hub - Company</span>
      </div>
      <div class="column">
        <ul>
          <li>
            <h2>Redes Sociais</h2>
          </li>
          <li><a href="https://br.linkedin.com/in/samuel-seven-88565a242" target="_blank">Linkedin</a></li>
          <li><a href="https://www.instagram.com/samuel_seven777/" target="_blank">Instagram</a></li>
          <li><a href="https://github.com/SevenOfice777" target="_blank">Github</a></li>
        </ul>
      </div>
      <div class="column">
        <h2>Contato</h2>
        <span>Email : sevenofice777@gmail.com </span>
        <span>Telefone : +5514997814551</span>
      </div>
    </div>
  </footer>

    <script>
        document.querySelector('.element-none').addEventListener("click", () => {
            toggleClass(document.querySelector('.header-responsive'), 'h-r-ngtv-pos', 'h-r-pstv-pos');
        });
    </script>
    <script src="../../scripts/functions/functions.js"></script>
    <script src="../../scripts/ajax_requests/ajax.js"></script>
    <script src="../../scripts/ajax_requests/servicos-bancarios-requests/extrato-requests.js"></script>
    <script src="../../scripts/ajax_requests/servicos-bancarios-requests/loadingUserData.js"></script>

</body>

</html>