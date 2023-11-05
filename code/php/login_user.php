<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> 7TECH- Inicio</title>

  <!-- scripts -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <!-- favicon -->
  <link rel="shortcut icon" href="../img-all/logo_crud.png" type="image/x-icon">
  <!-- css -->
  <link rel="stylesheet" href="../css/style.css" />

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
    </script>


</head>

<body>



  <header>
    <div class="logo">
      <img src="../img-all/logo_crud.png" alt="logo" />
    </div>
    <nav>
      <a href="../../index.html">INICIO</a>
      <a href="#" class="active_menu">ENTRAR</a>
      <a href="./signup.php">CADASTRO</a>
    </nav>
  </header>

  <div class="container secondScreen">
    <main>
      <div class="start_website">
        <div class="left">
          <div class="text">
            <h1>Login</h1>
            <p>Insira seu e-mail e senha para entrar na <b>7TECH</b></p>

          </div>
        </div>
        <div class="right">
          <div class="card">
            <h2>Formulário de Login</h2>
            <form dataForm='./login_verify.php'>
              <label for="name">E-mail</label>
              <input type="email" name="email" placeholder="E-mail" id="email">
              <label for="password">Senha</label>
              <input type="password" name="password" placeholder="Senha" id="password">
              <button btn-sbmt name="login_sbmt" id="btn_login">Cadastrar</button>
              <span class="log_error"></span>
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
  <script src="../js/submitBack.js"></script>
</body>

</html>