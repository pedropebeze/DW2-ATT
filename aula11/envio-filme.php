<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: envio-login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo filme</title>
</head>
<body>
    <h2>Cadastrar filme</h2>
    <p>Usuario: <?php echo htmlspecialchars($_SESSION["nome"]); ?></p>
    <form action="recebe-filme.php" method="post" enctype="multipart/form-data">
        Nome: <input type="text" name="nome" required><br><br>
        Descricao: <input type="text" name="descricao" required><br><br>
        Foto: <input type="file" name="foto" accept="image/*" required><br><br>
        Link: <input type="url" name="link" required><br><br>
        Classificacao (L = 0): <input type="number" name="classificacao" min="0" max="18" required><br><br>
        Nota de 0 a 10: <input type="number" name="nota" min="0" max="10" required><br><br>
        <input type="submit" value="Salvar filme">
    </form>
    <p><a href="filmes.php">Voltar</a></p>
</body>
</html>
