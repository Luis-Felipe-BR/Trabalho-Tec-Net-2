<?php
session_start();

// Verifica se o usuário já está logado
if(isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit;
}

// Verifica se os dados de login foram enviados via POST
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o nome de usuário e senha são válidos (por exemplo, hardcoded para fins de demonstração)
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username === 'user' && $password === 'password') {
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Nome de usuário ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
        <label for="username">Nome de Usuário:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Senha:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
