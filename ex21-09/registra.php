<?php

$texto = file_get_contents("receita.md");

$linhas = explode("\n", $texto);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Receitas</title>
</head>
<body>

<h1>Receitas</h1>

<?php

foreach ($linhas as $linha) {

    if (substr($linha, 0, 2) == "# ") {
        echo "<h2>" . substr($linha, 2) . "</h2>";
    }

    elseif (substr($linha, 0, 8) == "![Foto](") {
        $foto = str_replace("![Foto](", "", $linha);
        $foto = str_replace(")", "", $foto);

        echo "<img src='$foto' width='300'>";
    }

    elseif ($linha == "## Ingredientes") {
        echo "<h3>Ingredientes</h3>";
    }

    elseif ($linha == "## Modo de preparo") {
        echo "<h3>Modo de preparo</h3>";
    }

    elseif ($linha != "" && $linha != "---") {
        echo "<p>" . $linha . "</p>";
    }
}

?>

</body>
</html>