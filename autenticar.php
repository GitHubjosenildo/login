<?php

include_once("conexao.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $password = $_POST['senha'];

    
    $sql = "SELECT * FROM usuarios WHERE nome='$nome' AND senha='$password'";
    $resultado = $conexao->query($sql);


    if ($resultado->num_rows > 0) {
       
        header("Location: categoria.html");
        exit;
    } else {
       
        header("Location: login.php?erro=1");
        exit;
    }
} else {
    
    header("Location: login.php");
    exit;
}
?>
