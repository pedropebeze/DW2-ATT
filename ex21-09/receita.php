<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Receita</title>
</head>
<body>

<h1>Cadastrar Receita</h1>

<form action="registra.php" method="post" enctype="multipart/form-data">

    Nome:
    <br>
    <input type="text" name="nome">
    <br><br>

    Ingredientes:
    <br>
    <textarea name="ingredientes"></textarea>
    <br><br>

    Modo de preparo:
    <br>
    <textarea name="modo"></textarea>
    <br><br>

    Foto:
    <br>
    <input type="file" name="foto">
    <br><br>

    <input type="submit" value="Salvar">

</form>

</body>
</html>