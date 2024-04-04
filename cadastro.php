<?php
session_start();

// Verifica se o usuário já está logado
if(!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Verifica se os dados de cadastro foram enviados via POST
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processa os dados do formulário de cadastro
    // Aqui você pode inserir os dados em um array ou em qualquer outra estrutura de dados desejada
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $paginas = $_POST['paginas'];
    // Por exemplo, você pode armazenar os dados em uma sessão temporária
    $_SESSION['livros'][] = array('titulo' => $titulo, 'autor' => $autor, 'paginas' => $paginas);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h2>Cadastro</h2>
    <form action="cadastro.php" method="post">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo"><br>
        <label for="autor">Autor:</label><br>
        <input type="text" id="autor" name="autor"><br>
        <label for="paginas">Número de Páginas:</label><br>
        <input type="number" id="paginas" name="paginas"><br><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
