<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <form method="POST" action="login.php">
            <label for="username">Usuario: </label>
            <input type="text" name="login" placeholder="Digite seu usuario!" value="<?= $_POST["login"] ?? ""; ?>"><br><br>
            <label for="password">Senha: </label>
            <input type="text" name="senha" placeholder="Digite sua senha!"><br>
            <select name="tema">
                <option value="escuro">escuro</option>
                <option value="claro">claro</option>
            </select>
            <input type="submit" value="Entrar">
        </form>
    </body>
</html>