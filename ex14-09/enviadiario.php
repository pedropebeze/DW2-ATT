<?php

if (isset($_GET["diario"])) {

    $texto = $_GET["diario"];

    $texto_salvo = $texto . "<br><br>";

    file_put_contents("diario.md", $texto_salvo, FILE_APPEND);

    echo "Diário salvo com sucesso!";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Meu Diário</title>
</head>

<body>

<h1>Meu Diário</h1>

<form>

    <label>Escreva seu diário:</label>
    <br><br>

    <input type="text" name="diario"></input>

    <br><br>

    <input type="submit" value="Salvar">

</form>

<br>

<a href="recebediario.php">Ver meu diário</a>

</body>
</html>
