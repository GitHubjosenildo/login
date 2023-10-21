<!DOCTYPE html>
<html>
<head>
    <title>Página Inicial</title>
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
            background-color: royalblue;
            color: #fff;
            padding: 20px;
        }

        p {
            margin: 20px;
        }

        button {
            background-color: royalblue;
            color: #fff;
            border: none;
            padding: 15px 25px;
            cursor: pointer;
            border-radius: 8px;
            font-size: 15px;
            margin: 10px;
        }

        button a {
            text-decoration: none;
            color: #fff;
        }

        button:hover {
            background-color: #005b91;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.1); /* Fundo branco com transparência */
        }
    </style>
</head>
<body>
    <h1>Bem-vindo ao Book de Treinos</h1>
    <p>Para continuar, faça o login ou cadastre sua conta</p>
    <div class="container">
        <button><a href="login.php">Login</a></button>
        <button><a href="pagamento.html">Cadastrar Conta</a></button>
    </div>

    <?php
        include_once("conexao.php");
    ?>

    <div class="container">
        <h1>Escolha o Plano Ideal para Voce</h1>
        <p>Estamos comprometidos em ajuda-lo a alcancar seus objetivos. Oferecemos uma variedade de planos para atender as suas necessidades.</p>
        <p>Seja voce um iniciante procurando um ponto de partida acessivel ou um profissional em busca de recursos avancados, temos a opcao perfeita para voce.</p>
        <p>Escolha o plano que se alinha com seus objetivos e comece a trilhar o caminho para o sucesso agora mesmo!</p>
        <a href="planos.html">
            <button>Explorar Planos</button>
        </a>
    </div>
    <p>Sobre o Nosso Site de Book de Treinos</p>

    <p><br>Bem-vindo ao nosso site de book de treinos, o seu destino definitivo para encontrar, compartilhar e criar treinos físicos personalizados. Nosso site nasceu da paixão por fitness, saúde e bem-estar, e temos o compromisso de ajudar você a atingir seus objetivos de condicionamento físico de maneira eficaz e personalizada.</br><p>

    <p>Quem Somos</p>

    Nós somos um grupo de entusiastas do fitness, treinadores e profissionais da área de saúde que acreditam que a atividade física é fundamental para uma vida saudável. Com anos de experiência, reunimos uma equipe que busca facilitar a jornada de qualquer pessoa em direção a uma vida mais saudável e ativa.<p>

    <p>Nossa Missão</p>

Nossa missão é proporcionar a todos, independentemente de seu nível de condicionamento físico, a oportunidade de encontrar, compartilhar treinos que se adaptem às suas necessidades e metas individuais. Acreditamos que não existe um único caminho para o sucesso em fitness, e é por isso que oferecemos uma plataforma que promove a diversidade e a personalização.<p>

<p>O Que Oferecemos</p>

<p> Treinos: Explore nossa extensa biblioteca de treinos criados por treinadores profissionais e entusiastas do fitness. Encontre o treino perfeito para você, seja você um iniciante ou um atleta experiente.

Estamos comprometidos em fornecer as ferramentas e o suporte necessários para que você alcance seus objetivos de condicionamento físico. Seja bem-vindo ao nosso site de book de treinos, e esperamos que esta plataforma o ajude a iniciar, melhorar ou diversificar sua jornada no mundo do fitness.

<p>Junte-se a nós e comece a transformação hoje!</p>

<a href="suporte.html">
            <button>Suporte</button>

</body>
</html>
