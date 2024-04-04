<?php
session_start();

// Verifica se o usuário já está logado
if(!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Dashboard</h2>
    <p>Bem-vindo, <?php echo $_SESSION['username']; ?>!</p>
    <h3>Livros Cadastrados</h3>
    <?php if(isset($_SESSION['livros']) && !empty($_SESSION['livros'])): ?>
        <ul>
            <?php foreach($_SESSION['livros'] as $livro): ?>
                <li>
                    <strong>Título:</strong> <?php echo $livro['titulo']; ?><br>
                    <strong>Autor:</strong> <?php echo $livro['autor']; ?><br>
                    <strong>Número de Páginas:</strong> <?php echo $livro['paginas']; ?><br>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhum livro cadastrado.</p>
    <?php endif; ?>
    <a href="logout.php">Logout</a>
</body>
</html>
