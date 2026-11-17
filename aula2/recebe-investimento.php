<?php
$capital = $_GET['capital'];
$taxa = $_GET['taxa'] / 100;
$tempo = $_GET['tempo'];

$juros = $capital * $taxa * $tempo;

echo "Juros simples: " . $juros;
?>
