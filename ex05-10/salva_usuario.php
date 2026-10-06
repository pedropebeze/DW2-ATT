<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "site";
$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);


$n = $_GET['nome'];
$f = $_GET['email'];
$v = $_GET['senha'];
$comando = "INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES (NULL, '$n', '$f', '$v');";

$linhas = $conexao->exec($comando);
if($linhas = 1){
    echo "Dados salvos!";
}else{
    echo "Erro ao salvar dados!";
}

?>