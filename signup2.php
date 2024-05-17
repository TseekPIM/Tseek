<?php
include('class/Classes.php');

// session_start();
if(isset($_POST['btnCadastrar'])){
    $Candidato = new Candidato();
    $id = $Candidato->cadastrar($_POST,$_FILES['foto']);  
    header('location:player-details1.php?'.$id);
  }
?>
<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <title>TSeeK - Cadastra-se </title>
  <link rel="stylesheet" href="assets/css/login2.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!doctype html>

<html lang="pt-br"> 

 <head> 

  <meta charset="UTF-8"> 

  <title>TSeeK - Cadastra-se</title> 

  <link rel="stylesheet" href="assets/css/login2.css"> 

 </head> 

 <body> <!-- partial:index.partial.html --> 

  <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 

   <div class="signin"> 

    <div class="content"> 

     <h2>Cadastra-se</h2> 

     <form action="processa.php" method="POST">
          <div class="form">

      <div class="inputBox"> 

       <input name= "apelido" type="text" required> <i>Username</i> 

      </div> 

      <div class="inputBox"> 

       <input name= "nome" type="text" id="nome" required> <i>Nome Completo</i>

      </div> 

      <div class="inputBox"> 

        <input name= "email" type="email" id="email" required> <i>E-mail</i>
        <div id="alertaEmail" class="alert alert-danger" style="display: none;"></div>
       </div> 

      <div class="inputBox"> 

        <input name= "senha" type="password" id="senha" required> <i>Senha</i> 
 
      </div> 

      <div class="inputBox"> 

        <input name= "confirma_senha" type="password" id="confirma_senha" required> <i>Confirme a Senha</i> 
        <div id="alertaEmail" class="alert alert-danger" style="display: none;"></div>
       </div> 


      <div style="color: #fff;">
        <label for="jogador">Jogador :</label>
        <input style="margin-right: 50px;"  type="radio" id="jogador" name="jogador" value="jogador">
  
        <label for="recrutador">Recrutador :</label>
        <input type="radio" id="recrutador" name="recrutador" value="recrutador">
      </div>

      <div class="links"> <p style="color: white;">Já tem cadastro? 
      <br>Clique em</p> <a href="login2.php"><br>Login</a> 

      </div> 

      <div class="inputBox"> 

       <input name= "btnCadastrar" type="submit" value="Cadastra-se"> 

      </div> 

      </form>

     </div> 

    </div> 

   </div> 

  </section> <!-- partial --> 

 </body>

</html>
<!-- partial -->
  
</body>
<?php include_once('assets/js/js.php');?>
<script>
  $('#confirma_senha').blur(function (e){
    e.preventDefault();
    var senha = $('#senha').val();
    var confirma_senha = $('#confirma_senha').val();
  
    if (senha != confirma_senha){
      $("#alerta").empty().hide();
      $("#alerta").append("Senhas não são iguais");
      $("#alerta").show();
      $('#confirma_senha').val();
      $('#senha').focus();

      
    }else{
      $("#alerta").empty().hide();
    }
  });
</script>

<script language="javascript"> 
//Aciona a validação do email ao sair do input
$('#email').blur(function(){
var email = $(this).val();
//Teste de validação
  if(email !=''){
    //alerta ('OK');
    $("#alertaemail").empty().hide();
    //verificar se já possui cadastro
    $.ajax({
      url: 'checarEmail.php',
      type: "POST",
      data: {email: email}
    }).done(function(resposta){
        //verificar se a resposta esta vazia
        //o que indica que o email não esta sendo utilizado
        if (!$.isEmptyObject(resposta)) {
          $("#alertaEmail").empty().hide();
          $("#alertaEmail").append("Este e-mail já esta sendo utilizado, informe outro E-mail!");
          $("#alertaEmail").show();
          $('#email').val();
          $('#email').focus();
        }else{
          $("#alertaEmail").empty().hide();
        }
    }).fail(function(jqXHR, textStatus) {
      console.log("Mensagem de erro:" + textStatus);
    })
  }
});
</script>

</html>
