<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Processamento de Alteracao</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(45deg, #5f61e1, rgba(97, 109, 28, 0.363));
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            background-color: #005b91;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        p {
            margin: 20px 0;
        }

        a {
            text-decoration: none;
            color: #005b91;
            font-weight: bold;
        }

        .voltar-button a {
            text-decoration: none;
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
        }

        .voltar-button a:hover {
            background-color: #005b91;
        }

        .mensagem {
            font-weight: bold;
            font-size: 20px;
            color: #3498db;
        }

        .error-message {
            font-weight: bold;
            font-size: 20px;
            color: #ff0000;
        }
    </style>
</head>
<body>
    <h1>Processamento de Alteracao</h1>

    <?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["novoNome"])) {
        $novoNome = $_POST["novoNome"];

        include 'conexao.php'; 

        // Verificar se o nome de usuário já existe
        $verificar_nome_sql = "SELECT id FROM usuarios WHERE nome = '$novoNome'";
        $verificar_nome_result = $conexao->query($verificar_nome_sql);

        if ($verificar_nome_result->num_rows > 0) {
            echo "<p class='error-message'>Erro: Este nome de usuário já está em uso.</p>";
        } else {
            // Recupere o ID do usuário com base no nome
            $seu_id = 0; // Inicialize com um valor padrão

            $selecionar_id_sql = "SELECT id FROM usuarios WHERE nome = '$novoNome'";
            $selecionar_id_result = $conexao->query($selecionar_id_sql);

            if ($selecionar_id_result->num_rows > 0) {
                $row = $selecionar_id_result->fetch_assoc();
                $seu_id = $row['id'];
            }

            // Use o ID recuperado na atualização
            $sql = "UPDATE usuarios SET nome = '$novoNome' WHERE id = $seu_id";

            if ($conexao->query($sql) === true) {
                echo "<p class='mensagem'>Nome alterado com sucesso para: " . htmlspecialchars($novoNome) . "</p>";
            } else {
                echo "<p class='error-message'>Erro ao atualizar o nome: " . $conexao->error;
            }
        }
    } else {
        echo "<p class='error-message'>O novo nome não foi enviado.</p>";
    }
} else {
    echo "<p class='error-message'>Requisicao invalida.</p>";
}

?>

    <div class="voltar-button">
        <p><a href="categoria.html">Voltar</a></p>
    </div>
</body>
</html>
