<?php
    $veic = $_GET['veic'];
    $veic = strtolower(trim($veic));
    if($veic == "carro"){
        echo "<img src='carro.png' alt='' width='200'>";
    }else
    if($veic == "moto"){
        echo "<img src='moto.png' alt='' width='200'>";
    }else
    if($veic == "onibus"){
        echo "<img src='onibus.png' alt='' width='200'>";
    }else
    if($veic == "bicicleta"){
        echo "<img src='bike.png' alt='' width='200'>";
    }else{
        echo "<img src='pé.png' alt='' width='200'><br>voce vai a pé mesmo";
    }
?>
<br>
<a href="envia.php">Voltar</a>