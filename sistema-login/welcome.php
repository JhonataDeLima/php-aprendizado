<?php
session_start();

if (empty($_SESSION['usuario_logado'])){
    header("Location: index.php");
    exit();
}

if(!empty($_COOKIE["tema"])){
    $tema = $_COOKIE["tema"];
    
    if($tema == "escuro"){
        $color = "#333333";
    }else{
        $color = "#D7FAFA";
    }
}else{
    $color = "red";
}
?>



<html>
    <head>
        <title>Home</title>
    </head>
    <body style="background-color:<?=$color?>;">
        <h1>Bem vindo <?= $_SESSION["usuario_logado"]?></h1><br>

        <br>
        <form method="POST" action="logout.php">
            <input type="submit" value="Logout" name="logout">
        </form>
    </body>
</html>