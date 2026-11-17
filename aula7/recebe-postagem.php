<?php
session_start();
if (!isset($_SESSION["nome"])) {
    header("Location: envio-login.php");
    exit;
}

$texto = trim($_POST["texto"] ?? "");
$temImagem = isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == UPLOAD_ERR_OK;

if ($texto == "" && !$temImagem) {
    die('Escreva um texto ou escolha uma imagem. <a href="envio-postagem.php">Voltar</a>');
}

$nomeImagem = "";
if ($temImagem) {
    $extensao = strtolower(pathinfo($_FILES["imagem"]["name"], PATHINFO_EXTENSION));
    if (!in_array($extensao, ["jpg", "jpeg", "png", "gif", "webp"]) ||
        getimagesize($_FILES["imagem"]["tmp_name"]) === false) {
        die('Escolha uma imagem válida. <a href="envio-postagem.php">Voltar</a>');
    }

    if (!is_dir("imagens")) {
        mkdir("imagens");
    }

    $nomeImagem = "imagens/" . uniqid() . "." . $extensao;
    if (!move_uploaded_file($_FILES["imagem"]["tmp_name"], $nomeImagem)) {
        die('Não foi possível salvar a imagem.');
    }
}

// Deixa cada postagem em duas linhas do arquivo do usuário.
$texto = str_replace(["\r", "\n"], " ", $texto);
$nome = $_SESSION["nome"];
$arquivo = preg_replace('/[^a-z0-9_-]/', '_', strtolower($nome)) . '.txt';
file_put_contents($arquivo, $texto . "\n" . $nomeImagem . "\n", FILE_APPEND);

header("Location: blog.php");
exit;
?>
