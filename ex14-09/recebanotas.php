<?php

if (isset($_GET["nome"])) {

    $nome = $_GET["nome"];
    $nota1 = $_GET["nota1"];
    $nota2 = $_GET["nota2"];
    $nota3 = $_GET["nota3"];

    $dados = $nome . " " . $nota1 . " " . $nota2 . " " . $nota3 . "<br>";

    file_put_contents("notas.txt", $dados, FILE_APPEND);

    echo "Dados salvos com sucesso!";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Notas do Aluno</title>
</head>

<body>

<h1>Notas do Aluno</h1>

<form>

    Nome:
    <input type="text" name="nome">

    <br><br>

    Nota 1:
    <input type="number" name="nota1">

    <br><br>

    Nota 2:
    <input type="number" name="nota2">

    <br><br>

    Nota 3:
    <input type="number" name="nota3">

    <br><br>

    <input type="submit" value="Salvar">

</form>

</body>

</html>
