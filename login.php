<?php

include 'conexao.php';


function limparInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$nome = $senha = '';
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = limparInput($_POST['nome']);
    $senha = limparInput($_POST['senha']);

    $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

    
    $sql = "INSERT INTO usuarios (nome, senha) VALUES (?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('ss', $nome, $senhaHash);

    if ($stmt->execute()) {
        $mensagem = "Cadastro realizado com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .painel {
            margin-top: 20px;
            font-size: 24px;
        }

        .card-top {
            margin-bottom: 20px;
        }

        .card-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 16px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 8px;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        button {
            background-color: #005b91;
            color: white;
           
            border-radius: 8px;
            padding: 10px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <form class="form" action="autenticar.php" method="post">
        <div class="card">
            <div class="card-top">
                <img class="imglogin" src="img/perfil.png" alt="">
                <h2 class="painel">Painel de Login</h2>
                <p>Seja bem-vindo à tela de login</p>
                <p>Insira seus dados para fazer o login</p>
            </div>

            <div class="card-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>
            </div>

            <div class="card-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>

            <div class="card-group">
                <label><input type="checkbox">Lembre-me</label>
            </div>

            <div class="card-group btn">
                <button type="submit">Acessar</button>
                <button><a href="index.php">Voltar</a></button>
                <p><button><a href="alterasenha.php">Esqueci a senha</a></button></p>
            </div>

            <?php
            if (!empty($mensagem)) {
                echo '<p>' . $mensagem . '</p>';
            }
            ?>
        </div>
    </form>
</body>
</html>
