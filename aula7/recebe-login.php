<?php
session_start();

$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

$usuarios = [];
if (file_exists("usuarios.txt")) {
    $usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

for ($i = 0; $i + 2 < count($usuarios); $i += 3) {
    $nome = $usuarios[$i];
    $emailArquivo = $usuarios[$i + 1];
    $senhaArquivo = $usuarios[$i + 2];

    if ($email == $emailArquivo && $senha == $senhaArquivo) {
        $_SESSION["nome"] = $nome;
        header("Location: blog.php");
        exit;
    }
}

echo 'Dados incorretos, tente novamente. <a href="envio-login.php">Voltar</a>';
?>
