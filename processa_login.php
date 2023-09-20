<?php
// Conectar ao banco de dados
$host = "localhost";
$usuario = "root";
$senha = "";
$banco_de_dados = "projeto";

$conexao = new mysqli($host, $usuario, $senha, $banco_de_dados);

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

// Receber os dados do formulário
$nome_de_usuario = $_POST['nome_de_usuario'];
$senha = $_POST['senha'];

// Consulta SQL para verificar o login
$sql = "SELECT * FROM usuarios WHERE nome_de_usuario = '$nome_de_usuario' AND senha = '$senha'";
$resultado = $conexao->query($sql);

if ($resultado->num_rows == 1) {
    // Login bem-sucedido
    session_start();
    $_SESSION['nome_de_usuario'] = $nome_de_usuario;
    header("Location: painel.php"); // Redirecionar para a página do painel após o login
} else {
    // Login falhou
    echo "Nome de usuário ou senha inválidos.";
}

$conexao->close();
?>
