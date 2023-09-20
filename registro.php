<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h1>Registro</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome_de_usuario = $_POST["nome_de_usuario"];
        $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); // Hash da senha
        // Insira os dados do usuário no banco de dados 
        $conexao = new mysqli("localhost", "root", "", "projeto");
        $query = "INSERT INTO usuarios (root, senha) VALUES ('$nome_de_usuario', '$senha')";
        $conexao->query($query);
        $conexao->close();
        echo "Registro bem-sucedido!";
    }
    ?>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nome_de_usuario">Nome de Usuário:</label>
        <input type="text" name="nome_de_usuario" required><br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br><br>
        
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
