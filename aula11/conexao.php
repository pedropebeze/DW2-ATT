<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "barrefilmes";

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
?>
