<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Usuário logado</title>
</head>
<body>
    <?php
    if (isset($_SESSION["nome"])) {
        echo "<h2>Olá, " . htmlspecialchars($_SESSION["nome"]) . "!</h2>";
    } else {
        echo '<p>Você precisa acessar a página de login.</p>';
    }
    ?>
    <p><a href="envio-login.php">Página de login</a></p>
</body>
</html>
