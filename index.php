<?php
session_start();
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

<body>
  <section class="form">
    <div id="login">
      <h3 id="title">CADASTRE-SE NO SITE</h3>

      <form action="index.php" method="POST">
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



    if((isset($_POST['salvar']))){

      $email = $_POST['email'];
      $senha = $_POST['senha'];
      $senhacod = md5($senha);

      $arquivo = 'dados.txt';
      $tamanhoArquivo = filesize($arquivo);
      $arquivoAberto = fopen($arquivo, 'a');
      fwrite($arquivoAberto, "Email: $email| Senha: $senhacod\r\n");
      fclose($arquivoAberto);

      if(isset($_POST['email']) && isset($_POST['senha'])){
        header("Location: logar.php");

      }else{
        $_SESSION['erroLogin'] = "Usuário ou senha inválidos";
      }

    }



  ?>

</html>
</body>
