<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: envio-login.php");
    exit;
}
require "conexao.php";

$idUsuario = $_SESSION["id_usuario"];
$idFilme = (int)($_POST["id_filme"] ?? 0);

$comando = $conexao->prepare("SELECT id FROM filmes WHERE id = ?");
$comando->execute([$idFilme]);
if (!$comando->fetch()) {
    die('Filme nao encontrado. <a href="filmes.php">Voltar</a>');
}

$comando = $conexao->prepare("SELECT COUNT(*) FROM curtidas WHERE id_usuario = ? AND id_filme = ?");
$comando->execute([$idUsuario, $idFilme]);

if ($comando->fetchColumn() > 0) {
    $comando = $conexao->prepare("DELETE FROM curtidas WHERE id_usuario = ? AND id_filme = ?");
} else {
    $comando = $conexao->prepare("INSERT INTO curtidas (id_usuario, id_filme) VALUES (?, ?)");
}
$comando->execute([$idUsuario, $idFilme]);

header("Location: filme.php?id=" . $idFilme);
exit;
?>
