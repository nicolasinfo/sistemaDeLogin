<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
  </head>
<body>
  <section class="form">
    <div id="login">
      <h3 id="title">INSIRA SEUS DADOS PARA O LOGIN</h3>

      <form action="logar.php" method="POST">
      <input class="inf" type="text" name="email" id="email" placeholder="Email"><br>
      <input class="inf" type="password" name="senha" id="senha" placeholder="Senha"><br>
      <input class="inf" type="submit" value="Salvar" name="salvar">
      </form>

      <?php
        if(isset($_SESSION['erroLogin'])){
          echo $_SESSION['erroLogin'];
          unset($_SESSION['erroLogin']);
        }
        ?>

    </div>
  </section>

  <?php
    session_start();

    if((isset($_POST['email'])) && (isset($_POST['senha']))){

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if($email == "candido@gmail.com" && $senha == "12345"){
          header("Location: adm.php");
        }else{
          echo "Email ou senha informados não estão cadastrados";
        }

      }else{
        $_SESSION['erroLogin'] = "Usuário ou senha inválidos";
      }



  ?>

</html>
</body>
