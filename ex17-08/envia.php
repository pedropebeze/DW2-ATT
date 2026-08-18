<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="veic.php">
    <h1>Ex1: Transportes</h1>
        <Label>Insira o meio de transporte que utiliza:</Label><br>
        <input type="text" name="veic">
        <button type="submit">Enviar</button>
    </form>
    <br>
    <hr>
    <form action="email.php">
    <h1>Ex2: email</h1>
        <Label>Insira o email:</Label><br>
        <input type="text" name="email"><br>
        <Label>Insira a senha:</Label><br>
        <input type="text" name="senha"><br>    
        <button type="submit">Enviar</button> | <input type='reset' value='Limpar'>
    </form>
    <br>
    <hr>
    <form action="camiseta.php">
    <h1>Ex3: Camiseta</h1>
        <label>Insira o tipo da camiseta:</label><br>
        <input type="radio" name="tipo" value="masc"><label for="">Masculino</label>
        <input type="radio" name="tipo" value="fem"><label for="">Feminino</label><br>
        <label for="">Insira o tamanho:</label><br>
        <input type="radio" name="tamanho" value="P"><label for="">P</label>
        <input type="radio" name="tamanho" value="M"><label for="">M</label>
        <input type="radio" name="tamanho" value="G"><label for="">G</label>
        <button type="submit">Enviar</button>
    </form>
    <br>
    <hr>
    <form action="news.php">
    <h1>Ex4: Noticias</h1>
        <Label>Insira o email:</Label><br>
        <input type="text" name="email2"><br>
        <input type="checkbox" name="noticias">
        <label for="">Desejo receber noticias.</label><br>
        <input type="checkbox" name="promo">
        <label for="">Desejo receber promoções.</label>
        <button type="submit">Enviar</button>
    </form>
    <br>
    <hr>
    <form action="cor.php">
        <h1>Ex5: Cor</h1>
        <label for="">Insira o texto desejado:</label><br>
        <input type="text" name="texto"><br>
        <label for="">Insira a cor do texto</label>
        <input type="color" name="cortexto"><br>   
        <label for="">Insira a cor do fundo</label>
        <input type="color" name="corfundo"><br>
        <button type="submit">Enviar</button>
    </form>
    <br>
    <hr>
    <form action="camiseta2.php">
        <h1>Ex6: Camisetas com descontos</h1>
        <label>Insira o tipo da camiseta:</label><br>
        <input type="radio" name="tipo" value="masc"><label for="">Masculino</label>
        <input type="radio" name="tipo" value="fem"><label for="">Feminino</label><br>
        <label for="">Insira o tamanho:</label><br>
        <input type="radio" name="tamanho" value="P"><label for="">P</label>
        <input type="radio" name="tamanho" value="M"><label for="">M</label>
        <input type="radio" name="tamanho" value="G"><label for="">G</label><br>
        <label for="">Insira a quantidade:</label>
        <input type="number" name="qnt" min=1 max=9>;
        <button type="submit">Enviar</button>
    </form>
</body>
</html>