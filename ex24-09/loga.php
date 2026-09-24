<?php

$email = $_POST["email"];
$senha = $_POST["senha"];

$arquivo = file("usuarios.txt", FILE_IGNORE_NEW_LINES);

$login = false;

for ($i = 0; $i < count($arquivo); $i += 3) {

    $nome = $arquivo[$i];
    $emailArquivo = $arquivo[$i + 1];
    $senhaArquivo = $arquivo[$i + 2];

    if ($email == $emailArquivo && $senha == $senhaArquivo) {
        $login = true;
        break;
    }
}

if ($login == false) {
    echo "Dados incorretos";
}else{
    echo "Olá, " . $nome;
    $nome = strtolower($nome);
    file_put_contents("$nome.txt", $nome, FILE_APPEND);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <input type="hidden" name="nome" value="Joao">
    <label>Texto:</label>
    <textarea name="texto"></textarea>
    <br><br>
    <label>Imagem:</label>
    <input type="file" name="imagem">
    <br><br>
    <button type="submit">Postar</button>
    </body>
</html>

<?php
}
?>


