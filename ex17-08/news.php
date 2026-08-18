<?php

    $email = $_GET['email2'];
    $noticias = isset($_GET['noticias']);
    $promo = isset($_GET['promo'])   ;

    if(!$noticias && !$promo)
        echo "Assinatura RECUSADA!!";
    else{
        echo "Email Cadastrado: $email<br>";
        
        if($email)
            echo "Receber notícias: SIM<br>";
        else
            echo "Receber notícias: NÃO<br>";

        if($promo)
            echo "Receber promoções: SIM<br>";
        else
            echo "Receber promoções: NÃO<br>";
    }
    
?>
<br>
<a href="envia.php">Voltar</a>