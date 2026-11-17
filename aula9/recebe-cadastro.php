<?php
$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$senha = trim($_POST["senha"] ?? "");

if ($nome == "" || $email == "" || $senha == "") {
    die('Preencha todos os campos. <a href="envio-cadastro.php">Voltar</a>');
}

require "conexao.php";

try {
    $comando = $conexao->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
    $comando->execute([$nome, $email, $senha]);
    echo 'Usuário cadastrado! <a href="envio-login.php">Fazer login</a>';
} catch (PDOException $erro) {
    echo 'Não foi possível cadastrar. Confira se o e-mail já está cadastrado. ';
    echo '<a href="envio-cadastro.php">Voltar</a>';
}

$conexao = null;
?>
