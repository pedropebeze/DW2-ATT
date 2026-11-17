<?php
session_start();
if (!isset($_SESSION["nome"])) {
    header("Location: envio-login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Nova postagem</title>
</head>
<body>
    <h2>Nova postagem</h2>
    <p>Usuário: <?php echo htmlspecialchars($_SESSION["nome"]); ?></p>
    <form action="recebe-postagem.php" method="POST" enctype="multipart/form-data">
        Texto:<br>
        <textarea name="texto" rows="5" cols="40"></textarea><br><br>
        Imagem: <input type="file" name="imagem" accept="image/*"><br><br>
        <button type="submit">Postar</button>
    </form>
    <p><a href="blog.php">Voltar ao blog</a></p>
</body>
</html>
