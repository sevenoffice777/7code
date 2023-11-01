<?php 
  include '../conn_host.php';
  include '../prepare.php';

  if(isset($_POST['signup_sbmt'])) {
    $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //todos os dados que vieram com o methodo post;
    $senha_hash = password_hash($data['password'], PASSWORD_BCRYPT); 
    // criptografia do $data['password'];
    
    $querySql = 'CALL INSERT_USER(?,?,?,?)';

    $stmt = $conn->prepare($querySql);

    $dataFilter = [
      'nome' => $data['name'],
      'email' => $data['email'],
      'dt_nasc' => $data['dt_nasc'],
      'password'=> $senha_hash
    ];

    

    $stmt->bind_param("ssss", $dataFilter['nome'] ,$dataFilter['dt_nasc'], $dataFilter['email'],$dataFilter['password']);
    
    if($stmt->execute()) {
       header("location: ./logs/sucssesLog.php?res=true");
    } else {
      header("location: ./logs/errorLog.php?res=false");
    }

  }




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
  <link rel="shortcut icon" href="../img-all/logo_crud.png" type="image/x-icon">
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="../style.css" />

</head>

<body>
  <header>
    <div class="logo">
      <img src="../img-all/logo_crud.png" alt="logo" />
    </div>
    <nav>
      <a href="../index.html">INICIO</a>
      <a href="./login_user.php">ENTRAR</a>
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
            <form action="" method="post">
              <label for="name">Nome</label>
              <input type="text" name="name" placeholder="Nome">
              <label for="email">E-mail</label>
              <input type="email" name="email" placeholder="E-mail">
              <label for="dt_nasc">Data de Nascimento</label>
              <input type="date" name="dt_nasc" placeholder="Data de Nascimento">
              <label for="password">Senha</label>
              <input type="password" name="password" placeholder="Senha">
              <input type="submit" value="Cadastrar" name="signup_sbmt" id="btn_sigup">
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

</body>

</html>