<?php

session_start();

require '../conn_host.php';
require '../prepare.php';

if (isset($_POST['login_sbmt'])) {

  if (isset($_POST['email']) && isset($_POST['password'])) {

    $emailUser = $_POST['email'];
    $passwordUser = $_POST['password'];


    $queryLogin = 'SELECT * FROM USER WHERE EMAIL = ? ';

    $params_user = array($emailUser);

    $res = prepareAndExecute($conn, $queryLogin, $params_user, "s");
    
    if($res){
      if (password_verify($passwordUser, $res['SENHA'])) {
        $_SESSION['NOME'] = $res['NOME'];

        header("Location: ./logs/sucssesLog.php?origem=true&res=true");
      } else {
        $erroLogin = 'E-mail ou Senha Invalidos';
      }
      // Nunca por a merda da barra em passagem de parametro pela url() --> obs: alivia dores de cabeça...
    }else {
      $erroLogin = 'E-mail ou Senha Invalidos';
    }
  } 
}
  
?>

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
  <link rel="stylesheet" href="../style.css" />


</head>

<body>



  <header>
    <div class="logo">
      <img src="../img-all/logo_crud.png" alt="logo" />
    </div>
    <nav>
      <a href="../index.html">INICIO</a>
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
            <form method="post" action="">
              <label for="name">E-mail</label>
              <input type="email" name="email" placeholder="E-mail" id="email" value="<?php if(isset($emailUser)){echo $emailUser;}?>">
              <label for="password">Senha</label>
              <input type="password" name="password" placeholder="Senha" id="password">
              <input type="submit" value="Entrar" name="login_sbmt" id="btn_login">
            </form>
            <?php
            if (isset($erroLogin)) {
              echo "<span id='log_error'>
                    $erroLogin
                  </span>";
            }
            ?>
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


</body>

</html>