<?php

$nome = $_POST["nome"];
$texto = $_POST["texto"];

$imagem = $_FILES["imagem"];
$nomeImagem = $imagem["name"];

move_uploaded_file($imagem["tmp_name"], "imagens/" . $nomeImagem);

$arquivo = fopen("postagens.txt", "a");

fwrite($arquivo, $nome . "\n");
fwrite($arquivo, $texto . "\n");
fwrite($arquivo, $nomeImagem . "\n");

fclose($arquivo);

echo "Postagem registrada!";
?>
