<?php
    session_start();
    $usuario_valido = "admin";
    $senha_valida = "admin";
    $erros = [];

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $dados = array_map ('htmlspecialchars', $_POST) ?? [];

        if($dados["login"] === $usuario_valido && $dados["senha"] === $senha_valida){
            
            $_SESSION["usuario_logado"] = $dados;
            header("Location: welcome.php");

        }else{
            echo "Usuário ou senha invalidos!";
            echo '<br><a href="index.php">voltar</a>';
        }
    }
?>