<?php
require "conexao.php";

$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$nascimento = $_POST["nascimento"] ?? "";
$senhaUsuario = $_POST["senha"] ?? "";

if ($nome == "" || $email == "" || $nascimento == "" || $senhaUsuario == "") {
    die('Preencha todos os campos. <a href="envio-cadastro.php">Voltar</a>');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !strtotime($nascimento) || $nascimento > date("Y-m-d")) {
    die('E-mail ou data invalida. <a href="envio-cadastro.php">Voltar</a>');
}

$comando = $conexao->prepare("SELECT id FROM usuarios WHERE email = ?");
$comando->execute([$email]);

if ($comando->fetch()) {
    echo 'Este e-mail ja esta cadastrado. <a href="envio-login.php">Entrar</a>';
} else {
    $senhaUsuario = hash("sha256", $senhaUsuario);
    $comando = $conexao->prepare("INSERT INTO usuarios (nome, email, nascimento, senha) VALUES (?, ?, ?, ?)");
    $comando->execute([$nome, $email, $nascimento, $senhaUsuario]);
    echo 'Usuario cadastrado! <a href="envio-login.php">Fazer login</a>';
}
?>
