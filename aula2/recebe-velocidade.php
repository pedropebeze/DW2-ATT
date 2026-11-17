<?php
$vel = $_GET['vel'];
$limite = $_GET['limite'];

if ($vel > $limite) {
    echo "Gerar multa";
}

if ($vel <= $limite) {
    echo "Direção segura";
}
?>
