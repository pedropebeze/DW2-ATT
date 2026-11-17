<?php
session_start();
if (!isset($_SESSION["nome"])) {
    header("Location: envio-login.php");
    exit;
}

$nome = $_SESSION["nome"];
$arquivo = preg_replace('/[^a-z0-9_-]/', '_', strtolower($nome)) . '.txt';
$postagens = [];
if (file_exists($arquivo)) {
    $postagens = file($arquivo, FILE_IGNORE_NEW_LINES);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meu blog</title>
</head>
<body>
    <h2>Olá, <?php echo htmlspecialchars($nome); ?>!</h2>
    <a href="envio-postagem.php">Nova postagem</a> |
    <a href="sair.php">Sair</a>
    <hr>
    <h3>Minhas postagens</h3>
    <?php
    if (count($postagens) == 0) {
        echo "Ainda não há postagens.";
    }

    // Cada postagem ocupa duas linhas: texto e imagem.
    for ($i = count($postagens) - 2; $i >= 0; $i -= 2) {
        echo "<p>" . htmlspecialchars($postagens[$i]) . "</p>";
        if ($postagens[$i + 1] != "") {
            echo '<img src="' . htmlspecialchars($postagens[$i + 1]) . '" width="250">';
        }
        echo "<hr>";
    }
    ?>
</body>
</html>
