<?php
if(!isset($_SESSION['id'])) {
    session_start();
    $id = $_SESSION['id'];
}

// if(!isset($_SESSION['id'])){
//     die("voce não pode acessar essa pagina pois não esta logado.<p><a href=\"login2.php\">Entrar</a></p>");
// }
?>