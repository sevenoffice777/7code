<?php
session_start();
$_SESSION['tokenUser'] = bin2hex(random_bytes(32));
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>  7Code Hub - Inicio</title>

  <!-- scripts -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <!-- favicon -->
  <link rel="shortcut icon" href="../assets/img/logo_crud.png" type="image/x-icon">
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="../styles/style.css" />
  <link rel="stylesheet" media="screen and (max-width: 1000px)" href="../styles/responsive/styles-responsive-tablets.css">
  <link rel="stylesheet" media="screen and (max-width: 550px)" href="../styles/responsive/styles-responsive-smartphones.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
  <div class="header-responsive h-r-ngtv-pos">
    <div class="nav-responsive">
      <a href="../../../index.html">INICIO</a>
      <a href="./signin.php">ENTRAR</a>
      <a href="#" class="active_menu">CADASTRO</a>
    </div>
  </div>
  <header>
    <div class="logo">
      <img src="../assets/img/logo_crud.png" alt="logo">
    </div>
    <nav>
      <a href="../../../index.html">INICIO</a>
      <a href="./signin.php">ENTRAR</a>
      <a href="#" class="active_menu">CADASTRO</a>
    </nav>
    <ion-icon name="menu-outline" class="element-none"></ion-icon>
  </header>

  <div class="container thirdScreen">
    <main>
      <div class="start_website">
        <div class="left">
          <div class="text">
            <h1>Cadastro</h1>
            <p>Insira seus dados para realizar o cadastro na <b> 7Code Hub</b></p>

          </div>
        </div>
        <div class="right">
          <div class="card">
            <h2>Formulário de Cadastro</h2>
            <form dataForm="../../server/models/signup_verify.php" id="signupForm">
              <label for="name">Nome</label>
              <input type="text" name="name" placeholder="Nome" value="<?php if (isset($data['name'])) {
                echo $data['name'];
              } ?>">
              <label for="email">E-mail</label>
              <input type="email" name="email" placeholder="E-mail" value="<?php if (isset($data['email'])) {
                echo $data['email'];
              } ?>">
              <label for="cpf">CPF</label>
              <input type="number" name="CPF" placeholder="CPF" value="<?php if (isset($data['cpf'])) {
                echo $data['CPF'];
              } ?>">
              <label for="dt_nasc">Data de Nascimento</label>
              <input type="date" name="dt_nasc" max="<?php echo date('Y-m-d'); ?>" placeholder="Data de Nascimento"
                value="<?php if (isset($data['dt_nasc'])) {
                  echo $data['dt_nasc'];
                } ?>">
              <label for="password">Senha</label>
              <div class="password-container">
                <input type="password" name="password" class="password-input" placeholder="Senha">
              <ion-icon name="eye-outline" class="hover-password"></ion-icon>
              </div>

              <button btn-sbmt name="signup_sbmt" id="btn_signup">Cadastrar</button>
              <span class='log_error'></span>

              <input type="text" name="tokenUser" hidden="hidden" value="<?php
              echo $_SESSION['tokenUser'];
              ?>">
            </form>
          </div>
          <a href="./signin.php"> Já tem uma conta? Entrar</a>
        </div>
      </div>
    </main>
  </div>


  
    <footer>
        <div class="columns">
            <div class="column">
                <div class="logo">
                    <img src="../assets/img/logo_crud.png" alt="logo">
                </div>
                <span> 7Code Hub - Company</span>
            </div>
            <div class="column">
                <ul>
                    <li><h2>Redes Sociais</h2></li>
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
  <script src="../scripts/functions/functions.js"></script>
  <script src="../scripts/ajax_requests/ajax.js"></script>
</body>

</html>