<?php

    $email = $_GET['email'];
    $senha = $_GET['senha'];

    if($email == "fulano@email.com" && $senha == "1234Thanos"){
        echo "Acesso permitido com sucesso!";
    }else{
        echo "Acesso NEGADO!!";
    }

?>
<br>
<a href="envia.php">Voltar</a>