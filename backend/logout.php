<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

// Remove cookie de sessão
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

header('Location: index.php');
exit;
?>
