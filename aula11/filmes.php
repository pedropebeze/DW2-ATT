<?php
session_start();
require "conexao.php";

$comando = $conexao->query("SELECT filmes.id, filmes.nome, filmes.foto, filmes.classificacao, filmes.nota_usuario, usuarios.nome AS autor FROM filmes JOIN usuarios ON usuarios.id = filmes.id_usuario ORDER BY filmes.id DESC");
$filmes = $comando->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Filmes</title>
</head>
<body>
    <h2>Filmes sugeridos</h2>
    <?php if (isset($_SESSION["id_usuario"])) { ?>
        <p>Ola, <?php echo htmlspecialchars($_SESSION["nome"]); ?>!</p>
        <p><a href="envio-filme.php">Novo filme</a> | <a href="envio-amizade.php">Amigos</a> | <a href="sair.php">Sair</a></p>
    <?php } else { ?>
        <p><a href="envio-login.php">Entrar</a> | <a href="envio-cadastro.php">Cadastrar</a></p>
    <?php } ?>

    <?php if (count($filmes) == 0) { ?>
        <p>Nenhum filme cadastrado.</p>
    <?php } ?>

    <?php foreach ($filmes as $filme) { ?>
        <hr>
        <h3><a href="filme.php?id=<?php echo $filme['id']; ?>"><?php echo htmlspecialchars($filme['nome']); ?></a></h3>
        <img src="<?php echo htmlspecialchars($filme['foto']); ?>" width="120" alt="Foto do filme"><br>
        <p>Por: <?php echo htmlspecialchars($filme['autor']); ?></p>
        <p>Classificacao: <?php echo $filme['classificacao'] == 0 ? 'L' : $filme['classificacao'] . ' anos'; ?></p>
        <p>Nota: <?php echo $filme['nota_usuario']; ?>/10</p>
    <?php } ?>
</body>
</html>
