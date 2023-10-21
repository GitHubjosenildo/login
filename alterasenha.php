<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Esqueci a Senha</title>
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

        h1 {
            font-size: 24px;
            margin-top: 20px;
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

        .cadastro-button {
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

        .voltar-button a {
            text-decoration: none;
            background-color: #005b91;
            color: #fff;
            padding: 10px 129px;
            border-radius: 8px;
            font-size: 16px;
        }

        

    </style>
</head>
<body>
    <div class="card">
        <img class="imglogin" src="img/perfil.png" alt="">
        <h1>Esqueci a Senha</h1>

        <?php
        include 'conexao.php';

        // Função para escapar dados de entrada
        function limparInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $mensagem = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = limparInput($_POST['nome']);
            $novaSenha = limparInput($_POST['novaSenha']);

            // Verifique se o nome de usuário existe no banco de dados
            $verificar_nome_sql = "SELECT id FROM usuarios WHERE nome = ?";
            $stmt = $conexao->prepare($verificar_nome_sql);
            $stmt->bind_param('s', $nome);

            if ($stmt->execute()) {
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    // O nome de usuário existe, atualize a senha
                    $atualizar_senha_sql = "UPDATE usuarios SET senha = ? WHERE nome = ?";
                    $stmt_update = $conexao->prepare($atualizar_senha_sql);
                    $stmt_update->bind_param('ss', $novaSenha, $nome);

                    if ($stmt_update->execute()) {
                        $mensagem = "Senha alterada com sucesso!";
                    } else {
                        $mensagem = "Erro ao atualizar a senha: " . $stmt_update->error;
                    }

                    $stmt_update->close();
                } else {
                    $mensagem = "Nome de usuário não encontrado. Certifique-se de que você inseriu o nome de usuário correto.";
                }
            } else {
                $mensagem = "Erro na verificação do nome de usuário: " . $stmt->error;
            }

            $stmt->close();
        }
        ?>

        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="card-group">
                <label for="nome">Nome de Usuário</label>
                <input type="text" name="nome" required>
            </div>
            <div class="card-group">
                <label for="novaSenha">Nova Senha</label>
                <input type="password" name="novaSenha" required>
            </div>
            <div class="card-group">
                <input type="submit" class="cadastro-button" value="Redefinir Senha">
            </div>
        </form>

        <?php
        if (!empty($mensagem)) {
            echo '<p>' . $mensagem . '</p>';
        }
        ?>

<div class="voltar-button">
    <a href="index.php">Voltar</a>
        </div>
    </div>
</body>
</html>
