<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: envio-login.php");
    exit;
}
require "conexao.php";

$nome = trim($_POST["nome"] ?? "");
$descricao = trim($_POST["descricao"] ?? "");
$link = trim($_POST["link"] ?? "");
$classificacao = $_POST["classificacao"] ?? "";
$nota = $_POST["nota"] ?? "";

if ($nome == "" || $descricao == "" || $link == "" || $classificacao === "" || $nota === "") {
    die('Preencha todos os campos. <a href="envio-filme.php">Voltar</a>');
}

if (!ctype_digit((string)$classificacao) || $classificacao > 18 || $classificacao > $_SESSION["idade"]) {
    die('Classificacao acima da sua idade ou invalida. <a href="envio-filme.php">Voltar</a>');
}
if (!ctype_digit((string)$nota) || $nota > 10) {
    die('A nota deve ser de 0 a 10. <a href="envio-filme.php">Voltar</a>');
}
if (!filter_var($link, FILTER_VALIDATE_URL) || !in_array(parse_url($link, PHP_URL_SCHEME), ["http", "https"])) {
    die('Link invalido. <a href="envio-filme.php">Voltar</a>');
}

if (!isset($_FILES["foto"]) || $_FILES["foto"]["error"] != 0) {
    die('Selecione uma imagem. <a href="envio-filme.php">Voltar</a>');
}

$extensao = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));
if (!in_array($extensao, ["jpg", "jpeg", "png", "gif", "webp"]) || !getimagesize($_FILES["foto"]["tmp_name"])) {
    die('A foto deve ser uma imagem. <a href="envio-filme.php">Voltar</a>');
}

if (!is_dir("imagens")) {
    mkdir("imagens");
}
$foto = "imagens/" . uniqid("filme_") . "." . $extensao;

if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $foto)) {
    die('Nao foi possivel salvar a foto. <a href="envio-filme.php">Voltar</a>');
}

$comando = $conexao->prepare("INSERT INTO filmes (id_usuario, nome, descricao, foto, link, classificacao, nota_usuario) VALUES (?, ?, ?, ?, ?, ?, ?)");
$comando->execute([$_SESSION["id_usuario"], $nome, $descricao, $foto, $link, $classificacao, $nota]);

header("Location: filme.php?id=" . $conexao->lastInsertId());
exit;
?>
