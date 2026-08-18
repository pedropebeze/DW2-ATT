<?php

    $texto = $_GET['texto'];
    $corfundo = $_GET['corfundo'];
    $cortexto = $_GET['cortexto'];

    echo "<body style='background-color:$corfundo;'>";
    echo "<h1 style='color:$cortexto;'>$texto</h1>";
    echo "</body>";
    
?>
<br>
<a href="envia.php">Voltar</a>