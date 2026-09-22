<?php

$nome = $_POST["nome"];
$ingredientes = $_POST["ingredientes"];
$modo = $_POST["modo"];

$foto = $_FILES["foto"]["name"];

move_uploaded_file(
    $_FILES["foto"]["tmp_name"],
    "imagens/" . $foto
);

$texto = "# " . $nome . "\n\n";
$texto .= "![Foto](imagens/" . $foto . ")\n\n";
$texto .= "## Ingredientes\n";
$texto .= $ingredientes . "\n\n";
$texto .= "## Modo de preparo\n";
$texto .= $modo . "\n\n";
$texto .= "---\n";

file_put_contents("receita.md", $texto, FILE_APPEND);

echo "Receita salva!";
echo "<br><a href='receita.php'>Ver receita</a>";   