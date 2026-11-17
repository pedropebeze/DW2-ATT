<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: envio-login.php");
    exit;
}
require "conexao.php";

$idUsuario = $_SESSION["id_usuario"];
$idFilme = (int)($_POST["id_filme"] ?? 0);
$comentario = trim($_POST["comentario"] ?? "");

if ($comentario == "" || strlen($comentario) > 300) {
    die('Escreva um comentario de ate 300 caracteres. <a href="filmes.php">Voltar</a>');
}

$comando = $conexao->prepare("SELECT id_usuario FROM filmes WHERE id = ?");
$comando->execute([$idFilme]);
$filme = $comando->fetch(PDO::FETCH_ASSOC);

if (!$filme) {
    die('Filme nao encontrado. <a href="filmes.php">Voltar</a>');
}

$comando = $conexao->prepare("SELECT COUNT(*) FROM amigos WHERE id_usuario = ? AND id_amigo = ?");
$comando->execute([$idUsuario, $filme["id_usuario"]]);
if ($comando->fetchColumn() == 0) {
    die('Voce so pode comentar em filmes de amigos. <a href="filmes.php">Voltar</a>');
}

$comando = $conexao->prepare("INSERT INTO comentarios (id_usuario, id_filme, comentario) VALUES (?, ?, ?)");
$comando->execute([$idUsuario, $idFilme, $comentario]);

header("Location: filme.php?id=" . $idFilme);
exit;
?>
