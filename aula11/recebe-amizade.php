<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: envio-login.php");
    exit;
}
require "conexao.php";

$idUsuario = $_SESSION["id_usuario"];
$acao = $_POST["acao"] ?? "";

if ($acao == "solicitar") {
    $idAmigo = (int)($_POST["id_amigo"] ?? 0);
    if ($idAmigo == $idUsuario || $idAmigo <= 0) {
        die('Usuario invalido. <a href="envio-amizade.php">Voltar</a>');
    }

    $comando = $conexao->prepare("SELECT id FROM usuarios WHERE id = ?");
    $comando->execute([$idAmigo]);
    if (!$comando->fetch()) {
        die('Usuario nao encontrado. <a href="envio-amizade.php">Voltar</a>');
    }

    $comando = $conexao->prepare("SELECT COUNT(*) FROM amigos WHERE id_usuario = ? AND id_amigo = ?");
    $comando->execute([$idUsuario, $idAmigo]);
    $jaAmigos = $comando->fetchColumn() > 0;

    $comando = $conexao->prepare("SELECT COUNT(*) FROM pendente WHERE (id_usuario = ? AND id_amigo = ?) OR (id_usuario = ? AND id_amigo = ?)");
    $comando->execute([$idUsuario, $idAmigo, $idAmigo, $idUsuario]);
    $jaPendente = $comando->fetchColumn() > 0;

    if (!$jaAmigos && !$jaPendente) {
        $comando = $conexao->prepare("INSERT INTO pendente (id_usuario, id_amigo) VALUES (?, ?)");
        $comando->execute([$idUsuario, $idAmigo]);
    }
} elseif ($acao == "aprovar" || $acao == "recusar") {
    $idPendente = (int)($_POST["id_pendente"] ?? 0);
    $comando = $conexao->prepare("SELECT id_usuario FROM pendente WHERE id = ? AND id_amigo = ?");
    $comando->execute([$idPendente, $idUsuario]);
    $pedido = $comando->fetch(PDO::FETCH_ASSOC);

    if (!$pedido) {
        die('Pedido nao encontrado. <a href="envio-amizade.php">Voltar</a>');
    }

    if ($acao == "aprovar") {
        $comando = $conexao->prepare("INSERT IGNORE INTO amigos (id_usuario, id_amigo) VALUES (?, ?), (?, ?)");
        $comando->execute([$idUsuario, $pedido["id_usuario"], $pedido["id_usuario"], $idUsuario]);
    }

    $comando = $conexao->prepare("DELETE FROM pendente WHERE id = ?");
    $comando->execute([$idPendente]);
} else {
    die('Acao invalida. <a href="envio-amizade.php">Voltar</a>');
}

header("Location: envio-amizade.php");
exit;
?>
