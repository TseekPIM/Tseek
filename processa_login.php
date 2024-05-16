<?php
// Arquivo classes.php contém a lógica de autenticação
require_once('class/Classes.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Instancie a classe de autenticação e chame o método de login
    $auth = new Authentication();
    $login_result = $auth->login($email, $senha);

    if ($login_result === true) {
        // Login bem-sucedido, você pode redirecionar ou exibir uma mensagem de boas-vindas.
        echo "Login bem-sucedido!";
    } else {
        // Credenciais inválidas, exiba uma mensagem de erro.
        echo "Credenciais inválidas. Tente novamente.";
    }
}
?>





