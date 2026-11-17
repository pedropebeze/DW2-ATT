<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Blog</title>
</head>
<body>
    <h2>Cadastro de usuário</h2>
    <form action="recebe-cadastro.php" method="POST">
        Nome: <input type="text" name="nome" required><br><br>
        E-mail: <input type="email" name="email" required><br><br>
        Senha: <input type="password" name="senha" required><br><br>
        <button type="submit">Cadastrar</button>
    </form>
    <p><a href="envio-login.php">Já tenho uma conta</a></p>
</body>
</html>
