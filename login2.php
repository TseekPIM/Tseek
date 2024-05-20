<?php
include('class/Classes.php');
// include('class/processa_login.php');
$Candidato = new Candidato();

if (isset($_POST['btnLogar'])) {
  $Candidato->logar($_POST['email'],$_POST['senha']);
  header('location:index-att.php');

}
?>
<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <title>TSeeK - Login </title>
  <link rel="stylesheet" href="index.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!doctype html>

<html lang="pt-br"> 

 <head> 

  <meta charset="UTF-8"> 

  <title>TSeeK - login</title> 

  <link rel="stylesheet" href="index.css"> 

 </head> 

 <body> <!-- partial:index.partial.html --> 

  <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 

    <div class="signin">
      <div class="content">
        <h2>Login</h2>
        <form action="?" method="POST">
          <div class="form">
            <div class="inputBox">
              <input type="text" name="email" id="email" required> <!-- Adicione o atributo "name" -->
              <i>E-mail</i>
            </div>
            <div class="inputBox">
              <input type="password" name="senha" id="senha" required> <!-- Adicione o atributo "name" -->
              <i>Password</i>
            </div>
            <div class="links">
              <a href="#">Esqueceu a Senha?</a>
              <a href="signup2.php">Cadastra-se</a>
            </div>
            <div class="inputBox">
              <input type="submit" value="Login" id='btnLogar'>
            </div>
            <div class="links">
              <a href="index.php">Voltar</a>
            </div>
          </div>

          <?php 
            if (isset($_GET['e'])) {
              echo '<div class="alert alert danger" role="alert">E-mail ou senha inválida </div>';
            }
          ?>
          <?php 
            if (isset($_GET['ok'])) {
              echo '<div class="alert alert danger" role="alert">Fechado com sucesso</div>';
            }
          // ?>
        </form>
    </div> 

   </div> 

  </section> <!-- partial --> 

 </body>
<?php include_once('assets/js/js.php') ?>
</html>
<!-- partial -->
  

</body>

</html>
