<?php

    $qnt = $_GET['qnt'];
    $tipo = $_GET['tipo'];
    $tamanho = $_GET['tamanho'];
    $valor = 0;
    if($tipo == "masc")
        $valor += 30;
    else
        $valor += 25;

    switch($tamanho){
        case "P":$valor -= 5;break;
        case "M":$valor += 1;break;
        case "G":$valor += 10;break;
    }
    $desconto = $qnt * 3 * $valor /100;
    $valorF = $valor * $qnt - $desconto;
    echo "Valor final da camiseta: $valorF";
?>
<br>
<a href="envia.php">Voltar</a>
