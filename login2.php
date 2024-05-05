<?php
include('class/Classes.php');
// $db_host = 'localhost';// servidor
// $db_nome    = "tseek";    //nome do banco
// $db_usuario = 'root'; //usuario do banco
// $db_senha = '';
// $db_driver  = "mysql";
// $db_porta   = "3306";
// $mysqli = new mysqli($db_host, $db_usuario, $db_senha, $db_nome, $db_porta);

// if ($mysqli->connect_error) {
//     die("Conexão falhou: " . $mysqli->connect_error);
// }

// if(isset($_POST['email'])|| isset($_POST['senha'])){
//     if(strlen($_POST['email']) == 0){
//         echo "preencha seu e-mail";
//     } else if(strlen($_POST['senha']) == 0) {
//         echo "preencha sua senha";
//     } else {
//         $email = $mysqli->real_escape_string($_POST['email']);
//         $senha = $mysqli->real_escape_string($_POST['senha']);

//         $sql_code = "SELECT * FROM candidato WHERE email = '$email' AND senha = '$senha'";
//         $sql_query = $mysqli->query($sql_code) or die("falha na execuçaõ do codigo SQL:" . $mysqli->error);
      
//         $quantidade = $sql_query->num_rows;

//         if($quantidade == 1){
             
//             $candidato = $sql_query->fetch_assoc();

//             if(!isset($_SESSION)){
//                 session_start();
//             }

//             $_SESSION['id'] = $candidato['id'];
//             $_SESSION['nome'] = $candidato['nome'];

//             header("location: index-att.php");

//         }else{
//             echo "falha ao logar! email ou senha invalidos";
//         }
//     }

// }

// $Candidato = new Candidato();
// if (isset($_POST['btnLogar'])) {
//   $Candidato->Logar($_POST['email'], $_POST['senha']);
// }
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
        <form action="" method="POST">
          <div class="form">
            <div class="inputBox">
              <input type="text" name="email" required> <!-- Adicione o atributo "name" -->
              <i>E-mail</i>
            </div>
            <div class="inputBox">
              <input type="password" name="senha" required> <!-- Adicione o atributo "name" -->
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
              <a href="index.php.html">Voltar</a>
            </div>
          </div>
        </form>
    </div> 

   </div> 

  </section> <!-- partial --> 

 </body>

</html>
<!-- partial -->
  
</body>
</html>
