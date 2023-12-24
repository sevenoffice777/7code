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

            <h1>Transferencias <b>Bancárias</b></h1>
            <p>Aqui, você pode transferir seu dinheiro com total <b>segurança</b>!</p>

        </div>
        <div class="start_website">
            <div class="transferencias_container">
                <h1>Transferir <b>R$ Dinheiro</b></h1>
                <div class="transferencias_container_data">
                    <div class="transferencias_card">
                        <h2>Dados Da Transação</h2>
                        <label for="account_id_destiny">Conta de Destino</label>
                        <input type="text" name="account_id_destiny">
                        <label for="valor_tranferencia">Valor da Transferencia</label>
                        <input type="number" name="valor_transferencia" id="vl_transferencia">
                        <label for="desc_transferencia">Descrição Da Transferencia (opcional)</label>
                        <textarea name="desc_transferencia"  cols="30" rows="5"></textarea>
                        
                    </div>
                    <img src="../../assets/img/troca.png" alt="troca_img" id="troca_img">
                    <div class="transferencias_log">
                        <h2>Confirmação de Transferencia</h2>
                        <ul>
                            <li>
                                <span class="logInfo">Nome Do Usuario - </span>
                                 <span txtValue="username"></span>
                            </li>
                            <li>
                                <span class="logInfo">Conta do Usuario - </span>
                                <span txtValue="accountNumber"></span>
                            </li>
                            <li>
                                <span class="logInfo">
                                    Valor Da Transferencia -
                                </span>
                                <span>
                                    <span thisValue="value_transferencia">
                                </span>
                            </li>
                            <li>
                                <span class="logInfo">
                                    Conta De Destino -
                                </span>
                                <span thisValue="accountDestiny"></span>
                            </li>
                        </ul>
                        <input type="submit" value="Transferir">
                    </div>
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
    <script src="../../scripts/ajax_requests/servicos-bancarios-requests/transferencias-requests.js"></script>
    <script src="../../scripts/ajax_requests/servicos-bancarios-requests/loadingUserData.js"></script>

</body>