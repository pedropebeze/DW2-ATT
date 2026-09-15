<?php

if (file_exists("diario.md")) {
    $diario = file_get_contents("diario.md");
} else {
    $diario = "Nenhum diário foi escrito ainda.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Diário</title>
</head>

<body>

<h1>Meu Diário</h1>

<pre><?php echo $diario; ?></pre>

<br>

<a href="envia.php">Voltar</a>

</body>
</html>
