<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    
    <?php
    session_start();

    // Verifique se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome_de_usuario = $_POST["nome_de_usuario"];
        $senha = $_POST["senha"];

        
        $host = "localhost"; // Substitua pelo nome do host do seu banco de dados
        $usuario = "root"; // Substitua pelo nome de usuário do banco de dados
        $senha = ""; // Substitua pela senha do banco de dados
        $banco_de_dados = "projeto"; // Substitua pelo nome do banco de dados

       $conexao = new mysqli($host, $usuario, $senha, $banco_de_dados);



        // Verificar a conexão
        if ($conexao->connect_error) {
            die("Erro na conexão: " . $conexao->connect_error);
        }

        // Consulta SQL para verificar as credenciais
        $query = "SELECT * FROM usuarios WHERE nome_de_usuario = '$nome_de_usuario' AND senha = '$senha'";

        $resultado = $conexao->query($query);

        if ($resultado->num_rows == 1) {
            // Credenciais válidas, criar uma sessão de usuário
            $_SESSION["nome_de_usuario"] = $nome_de_usuario;
            header("Location: painel.php"); // Redirecionar para a página de painel após o login bem-sucedido
            exit();
        } else {
            // Credenciais inválidas, exibir uma mensagem de erro
            echo "<p>Credenciais inválidas. Tente novamente.</p>";
        }

        // Fechar a conexão com o MySQL
        $conexao->close();
    }
    ?>

    <!-- Formulário de login -->
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nome_de_usuario">Nome de Usuário:</label>
        <input type="text" name="nome_de_usuario" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
