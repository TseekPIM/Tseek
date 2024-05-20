<?php
// Iniciar a sessão
session_start();

// Limpar todas as variáveis de sessão
$_SESSION = array();

// Se deseja destruir completamente a sessão, também deve deletar o cookie da sessão.
// Note: Isso destruirá a sessão, não apenas os dados da sessão.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir a sessão
session_destroy();

// Redirecionar para a página de login ou outra página de sua escolha
header("Location: index.php");
exit;
?>
