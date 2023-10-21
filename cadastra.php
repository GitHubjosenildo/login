<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuario</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="card">
        <img class="imglogin" src="img/perfil.png" alt="">
        <h1>Tela de Cadastro</h1>

        <?php
        include 'conexao.php'; 

        $mensagem = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];

         
            $verificar_nome_sql = "SELECT id FROM usuarios WHERE nome = '$nome'";
            $resultado = $conexao->query($verificar_nome_sql);

            if ($resultado->num_rows > 0) {
                $mensagem = "Erro: Este nome de usuário já está em uso.";
            } else {
               
                $inserir_sql = "INSERT INTO usuarios (nome, senha) VALUES ('$nome', '$senha')";

                if ($conexao->query($inserir_sql) === true) {
                    $mensagem = "Cadastro realizado com sucesso!";
                } else {
                    $mensagem = "Erro ao cadastrar: " . $conexao->error;
                }
            }
        }
        ?>

        <?php if (!empty($mensagem)): ?>
            <p><?php echo $mensagem; ?></p>
        <?php endif; ?>

        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="card-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" required>
            </div>
            <div class="card-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" required>
            </div>
            <div class="card-group">
                <input type="submit" class="cadastro-button" value="Cadastrar">
            </div>
            <div class="card-group">
                <button><a href="login.php">Login</a></button>
                <button><a href="index.php">voltar</a></button>
            </div>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<style>
body {
    background-image: linear-gradient(45deg, #5f61e1, rgba(97, 109, 28, 0.363));
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.card {
    background-color: rgba(0, 0, 0, 0.9);
    padding: 40px;
    border-radius: 15px;
    color: white;
    text-align: center;
    width: 300px;
}

.imglogin {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin: 0 auto;
    display: block;
}

.card h1 {
    margin-top: 20px;
    font-size: 24px;
}

.card .card-group {
    margin-bottom: 20px;
}

.card label {
    display: block;
    font-size: 16px;
}

.card input[type="text"],
.card input[type="password"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 8px;
}

.card input[type="checkbox"] {
    margin-right: 5px;
}

.card button {
    background-color: #005b91;
    color: white;
    border-radius: 8px;
    padding: 10px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
}

.card a {
    text-decoration: none;
    color: white;
}

.cadastro-button {
    background-color: #005b91;
    color: white;
    border-radius: 8px;
    padding: 10px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
}
</style>
</html>