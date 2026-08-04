<?php
    echo "<h1>Ex1: Área de quadrado</h1>";
    $valor = $_GET['xval'];
    echo "Valor da área: ".$valor**2;

    echo "<br><br><hr>";//-----------------------------------------
    echo "<h1>Ex2: Idade ano que vem</h1>";
    $ano = $_GET['ano'];
    $idade = 2026-$ano;
    echo "Idade no ano que vem: ".++$idade;

    echo "<br><br><hr>";//-----------------------------------------
    echo "<h1>Ex3: Juros Simples</h1>";
    $capital = $_GET['capital'];
    $juros = $_GET['juros']/100;
    $tempo = $_GET['tempo'];
    $investimento = $capital*$juros*$tempo;

    echo "Investimento: ".$investimento;

    echo "<br><br><hr>";//-----------------------------------------
    echo "<h1>Ex4 e Ex5: Maior de Idade? | Entrada para o clube</h1>";
    $idade2 = $_GET['idade'];

    if($idade2 >= 18){
        echo "Maior de 18 anos";
    }else{
        echo "Menor de 18 anos";
    } echo "<br><br>";
    $membro = $_GET['membro'];
    $convidado = $_GET['convidado'];
    if($idade2 >=18){
        if($membro == "Sim" || $convidado == "Sim") echo "Entrada Permitida";
        else echo "Entrada Negada!";
    }else echo "Entrada Negada!";
    
    echo "<br><br><hr>";//-----------------------------------------
    echo "<h1>Ex6: Multa</h1>";

    $vel = $_GET['vel'];
    $lim = $_GET['lim'];
    if($vel<=$lim)
        echo "Direção Segura";
    if($vel>$lim)
        echo "Gerar Multa";



?>