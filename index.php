<!DOCTYPE html>
<html>
<head>
    <title>Sucesso</title>
</head>
<body>
    <h1>Login bem-sucedido!</h1>
    
    <?php
    session_start();

    // Verifique se o usuário está logado
    if (isset($_SESSION["nome_de_usuario"])) {
        $nome_de_usuario = $_SESSION["nome_de_usuario"];
        echo "<p>Bem-vindo, $nome_de_usuario!</p>";
        echo '<a href="logout.php">Sair</a>'; // Link para a página de logout
    } else {
        // Se não estiver logado, redirecione para a página de login
        header("Location: login.php");
        exit();
    }
    ?>
</body>
</html>

