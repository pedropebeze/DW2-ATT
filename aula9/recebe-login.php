<?php
session_start();

$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");

if ($nome == "" || $email == "") {
    die('Preencha nome e e-mail. <a href="envio-login.php">Voltar</a>');
}

require "conexao.php";

$comando = $conexao->prepare("SELECT nome FROM usuarios WHERE nome = ? AND email = ?");
$comando->execute([$nome, $email]);
$dados = $comando->fetch(PDO::FETCH_ASSOC);

if ($dados) {
    $_SESSION["nome"] = $dados["nome"];
    header("Location: mostra.php");
    exit;
} else {
    echo 'Dados incorretos, tente novamente. <a href="envio-login.php">Voltar</a>';
}

$conexao = null;
?>
