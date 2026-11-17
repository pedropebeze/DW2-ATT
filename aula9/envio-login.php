<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="recebe-login.php" method="POST">
        Nome: <input type="text" name="nome" required><br><br>
        E-mail: <input type="email" name="email" required><br><br>
        <input type="submit" value="Entrar">
    </form>
    <p><a href="envio-cadastro.php">Criar cadastro</a></p>
</body>
</html>
