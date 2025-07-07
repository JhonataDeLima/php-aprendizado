<?php
require_once("login.php");
if (empty($_SESSION['usuario_logado'])){
    header("Location: index.php");
    exit();
}

echo "Bem vindo {$_SESSION["usuario_logado"]["login"]} você está usando o tema: {$_SESSION["usuario_logado"]["tema"]} ";

?>
<br>
<form method="POST">
    <input type="submit" value="Logout" name="logout">
</form>

<?php 

if (isset($_POST['logout'])){
    unset($_SESSION["usuario_logado"]);
    header("Location: index.php");
}

?>