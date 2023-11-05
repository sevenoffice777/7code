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
  <title> 7TECH - Inicio</title>

  <!-- scripts -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <!-- favicon -->
  <link rel="shortcut icon" href="../assets/img/logo_crud.png" type="image/x-icon">
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="../styles/style.css" />

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <div class="logo">
      <img src="../assets/img/logo_crud.png" alt="logo" />
    </div>
    <nav>
      <a href="./index.html">INICIO</a>
      <a href="./signin.php">ENTRAR</a>
      <a href="#" class="active_menu">CADASTRO</a>
    </nav>
  </header>

  <div class="container thirdScreen">
    <main>
      <div class="start_website">
        <div class="left">
          <div class="text">
            <h1>Cadastro de Dados</h1>
            <p>Insira seus dados para realizar o cadastro na <b>7TECH</b></p>

          </div>
        </div>
        <div class="right">
          <div class="card">
            <h2>Formulário de Cadastro</h2>
            <form dataForm="./signup_verify.php" id="signupForm">
              <label for="name">Nome</label>
              <input type="text" name="name" placeholder="Nome" value="<?php if (isset($data['name'])) {
                echo $data['name'];
              } ?>">
              <label for="email">E-mail</label>
              <input type="email" name="email" placeholder="E-mail" value="<?php if (isset($data['email'])) {
                echo $data['email'];
              } ?>">
              <label for="dt_nasc">Data de Nascimento</label>
              <input type="date" name="dt_nasc" max="<?php echo date('Y-m-d'); ?>" placeholder="Data de Nascimento" value="<?php if (isset($data['dt_nasc'])) {
                echo $data['dt_nasc'];
              } ?>">
              <label for="password">Senha</label>
              <input type="password" name="password" placeholder="Senha">
              <button btn-sbmt name="signup_sbmt" id="btn_signup">Cadastrar</button>
              <span class='log_error'></span>

              <input type="text" name="tokenUser" hidden="hidden" value="<?php
              echo $_SESSION['tokenUser'];
              ?>">
            </form>
          </div>
        </div>
      </div>
    </main>
  </div>


  <footer>
    <ion-icon name="logo-github"></ion-icon>
    <p>Site criado e desenvolvido por &copy;<a href="https://br.linkedin.com/in/samuel-seven-88565a242"
        id="samuel_seven"> Samuel Seven</a></p>
    <ion-icon name="logo-linkedin"></ion-icon>
  </footer>

  <script src="../scripts/submitBack.js"></script>
</body>

</html>