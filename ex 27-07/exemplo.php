<?php
    $preco = $_GET['preco'];
    $quant = $_GET['qnt'];
    $result = (int) $preco*(int) $quant;
    echo "preco: $preco<br>quant: $quant<br>total: $result";
?>  