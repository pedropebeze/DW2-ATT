<?php
session_start();
require "conexao.php";

$email = trim($_POST["email"] ?? "");
$senhaUsuario = $_POST["senha"] ?? "";
$senhaUsuario = hash("sha256", $senhaUsuario);

$comando = $conexao->prepare("SELECT id, nome, nascimento FROM usuarios WHERE email = ? AND senha = ?");
$comando->execute([$email, $senhaUsuario]);
$dados = $comando->fetch(PDO::FETCH_ASSOC);

if ($dados) {
    $nascimento = new DateTime($dados["nascimento"]);
    $hoje = new DateTime("today");
    $idade = $nascimento->diff($hoje)->y;

    $_SESSION["id_usuario"] = $dados["id"];
    $_SESSION["nome"] = $dados["nome"];
    $_SESSION["idade"] = $idade;

    header("Location: filmes.php");
    exit;
}

echo 'E-mail ou senha incorretos. <a href="envio-login.php">Tentar novamente</a>';
?>
