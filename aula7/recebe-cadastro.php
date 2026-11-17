<?php
$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$senha = trim($_POST["senha"] ?? "");

if ($nome == "" || $email == "" || $senha == "") {
    die('Preencha todos os campos. <a href="envio-cadastro.php">Voltar</a>');
}

// Impede quebras de linha dentro do arquivo de cadastro.
$nome = str_replace(["\r", "\n"], " ", $nome);
$email = str_replace(["\r", "\n"], "", $email);
$senha = str_replace(["\r", "\n"], "", $senha);

// Cada pessoa tem um arquivo com o seu nome.
$nomeArquivo = preg_replace('/[^a-z0-9_-]/', '_', strtolower($nome)) . '.txt';

$usuarios = [];
if (file_exists("usuarios.txt")) {
    $usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

for ($i = 0; $i + 2 < count($usuarios); $i += 3) {
    $arquivoExistente = preg_replace('/[^a-z0-9_-]/', '_', strtolower($usuarios[$i])) . '.txt';
    if (strtolower($nome) == strtolower($usuarios[$i]) ||
        strtolower($email) == strtolower($usuarios[$i + 1]) ||
        $nomeArquivo == $arquivoExistente) {
        die('Nome ou e-mail já cadastrado. <a href="envio-cadastro.php">Voltar</a>');
    }
}

$dados = $nome . "\n" . $email . "\n" . $senha . "\n";
file_put_contents("usuarios.txt", $dados, FILE_APPEND);
file_put_contents($nomeArquivo, "");

echo 'Cadastro realizado! <a href="envio-login.php">Fazer login</a>';
?>
