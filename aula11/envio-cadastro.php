<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>
<body>
    <h2>Cadastro de usuario</h2>
    <form action="recebe-cadastro.php" method="post">
        Nome: <input type="text" name="nome" required><br><br>
        E-mail: <input type="email" name="email" required><br><br>
        Nascimento: <input type="date" name="nascimento" required><br><br>
        Senha: <input type="password" name="senha" required><br><br>
        <input type="submit" value="Cadastrar">
    </form>
    <p><a href="envio-login.php">Ja tenho cadastro</a></p>
</body>
</html>
