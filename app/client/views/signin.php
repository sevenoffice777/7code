<!DOCTYPE html>
<html lang="pt-BR">

<?php
session_start();

?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> 7Code Hub- Inicio</title>

  <!-- scripts -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <!-- favicon -->
  <link rel="shortcut icon" href="../assets/img/logo_crud.png" type="image/x-icon">
  <!-- css -->
  <link rel="stylesheet" href="../styles/geral.css" />
  <link rel="stylesheet" media="screen and (max-width: 1000px)"
    href="../styles/responsive/styles-responsive.css">

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
    </script>


</head>

<body>

  <div class="header-responsive h-r-ngtv-pos">
    <div class="nav-responsive">
      <a href="../../../index.html">INICIO</a>
      <a href="#" class="active_menu">ENTRAR</a>
      <a href="./signup.php">CADASTRO</a>
    </div>
  </div>
  <header>
    <div class="logo">
      <img src="../assets/img/logo_crud.png" alt="logo">
    </div>
    <nav>
      <a href="../../../index.html">INICIO</a>
      <a href="#" class="active_menu">ENTRAR</a>
      <a href="./signup.php">CADASTRO</a>
    </nav>
    <ion-icon name="menu-outline" class="element-none"></ion-icon>
  </header>

  <div class="container secondScreen">
    <main>
      <div class="start_website">
        <div class="left">
          <div class="text">
            <h1>Login</h1>
            <p>Insira seu e-mail e senha para entrar na <b> 7Code Hub</b></p>

          </div>
        </div>
        <div class="right">
          <div class="card">
            <h2>Formulário de Login</h2>
            <form dataForm='../../server/models/signin_verify.php'>
              <label for="name">E-mail</label>
              <input type="email" name="email" placeholder="E-mail" id="email">
              <label for="password">Senha</label>
              <div class="password-container">
                <input type="password" name="password" class="password-input" placeholder="Senha">
                <ion-icon name="eye-outline" class="hover-password"></ion-icon>
              </div>
              <button btn-sbmt name="login_sbmt" id="btn_login">Entrar</button>
              <span class="log_error"></span>
            </form>
          </div>
          <a href="./signup.php">É novo? Cadastrar</a>
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
  <script src="../scripts/ajax_requests/ajax.js"></script>
  <script src="../scripts/ajax_requests/signuser_request.js"></script>
   
  <script src="../scripts/functions/functions.js"></script>
</body>

</html>