<?php
session_start();
session_regenerate_id(true); // Evita fixação de sessão
include 'config.php'; 

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: dashboard.php');
        exit;
    } else {
        $erro = 'Usuário ou senha inválidos.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Password Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Entrar no Password Manager</h2>
        <?php if (!empty($erro)) echo "<p class='error'>$erro</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Nome de Usuário" required><br>
            <input type="password" name="password" placeholder="Senha" required><br>
            <button type="submit">Entrar</button>
        </form>
        <p>Ainda não tem conta? <a href="register.php">Cadastre-se</a></p>
    </div>
</body>
</html>
