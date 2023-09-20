<?php
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['nome_de_usuario'])) {
    header("Location: login.php"); // Redirecionar para a página de login se não estiver autenticado
}

// Exibir o painel do usuário autenticado
?>
<!DOCTYPE html>
<html>
<head>
    <title>Painel do Usuário</title>
</head>
<body>
    <h2>Painel do Usuário</h2>
    <p>Bem-vindo, <?php echo $_SESSION['nome_de_usuario']; ?>!</p>
    <p><a href="logout.php">Sair</a></p>
</body>
</html>
