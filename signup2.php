<?php
session_start();
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

       <input name= "nome" type="text" required> <i>Nome Completo</i>

      </div> 

      <div class="inputBox"> 

        <input name= "email" type="email" required> <i>E-mail</i>
 
       </div> 

      <div class="inputBox"> 

        <input name= "senha" type="password" required> <i>Senha</i> 
 
       </div> 

      <div class="links"> <p style="color: white;">Já tem cadastro? Clique em</p> <a href="login2.php">Login</a> 

      </div> 

      <div class="inputBox"> 

       <input name= "cadastrar" type="submit" value="Cadastra-se"> 

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

<!-- <script language="javascript">
// Aciona a validação do email ao sair do input
$('#email').blur(function(){        
var email = $(this).val();
// Testa a validação
    if(email != '') {
        // alert('OK');
        $("#alertaEmail").empty().hide();
        // verificar se já possui cadastro
        $.ajax({
            url: 'checarEmail.php',
            type:"POST",
            data: {email: email}                  
            }).done(function(resposta){                                           
                // verificar se a resposta está vazia,
                // o que indica que o e-mail não está sendo utilizado                      
                if( !$.isEmptyObject(resposta) ){
                    $("#alertaEmail").empty().hide();
                    $("#alertaEmail" ).append("Este e-mail já está sendo utilizado, informe outro E-mail!");
                    $("#alertaEmail").show();
                    $('#email').val('');
                    $('#email').focus();
                }else{
                    $("#alertaEmail").empty().hide();
                }
            }).fail(function(jqXHR, textStatus ) {
                console.log("Mensagem de erro: " + textStatus);
            });
    }

});
   
</script> -->


</html>
