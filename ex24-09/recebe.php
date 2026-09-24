<?php

$nome  = $_GET['nome'] ?? '';
$email = $_GET['email'] ?? '';
$senha = $_GET['senha'] ?? '';

if ($nome === '' || $email === '' || $senha === '') {
    echo 'Preencha nome, email e senha.';
    echo '<br><br><a href="registra.php">Voltar.</a>';
}else{

$dados = $nome . PHP_EOL
       . $email . PHP_EOL
       . $senha . PHP_EOL . PHP_EOL;

file_put_contents('usuarios.txt', $dados, FILE_APPEND);

echo 'Usuário salvo com sucesso!';
echo '<br><a href="login.php">login</a>';
}
?>
