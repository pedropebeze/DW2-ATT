<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: envio-login.php");
    exit;
}
require "conexao.php";
$idUsuario = $_SESSION["id_usuario"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Amigos</title>
</head>
<body>
    <h2>Amizades de <?php echo htmlspecialchars($_SESSION["nome"]); ?></h2>
    <p><a href="filmes.php">Voltar aos filmes</a></p>

    <h3>Pedidos recebidos</h3>
    <?php
    $comando = $conexao->prepare("SELECT pendente.id, usuarios.nome FROM pendente JOIN usuarios ON usuarios.id = pendente.id_usuario WHERE pendente.id_amigo = ?");
    $comando->execute([$idUsuario]);
    $pedidos = $comando->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php if (count($pedidos) == 0) { ?><p>Nenhum pedido.</p><?php } ?>
    <?php foreach ($pedidos as $pedido) { ?>
        <p><?php echo htmlspecialchars($pedido["nome"]); ?></p>
        <form action="recebe-amizade.php" method="post">
            <input type="hidden" name="id_pendente" value="<?php echo $pedido['id']; ?>">
            <button type="submit" name="acao" value="aprovar">Aprovar</button>
            <button type="submit" name="acao" value="recusar">Recusar</button>
        </form>
    <?php } ?>

    <h3>Meus amigos</h3>
    <?php
    $comando = $conexao->prepare("SELECT usuarios.nome FROM amigos JOIN usuarios ON usuarios.id = amigos.id_amigo WHERE amigos.id_usuario = ? ORDER BY usuarios.nome");
    $comando->execute([$idUsuario]);
    $amigos = $comando->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php if (count($amigos) == 0) { ?><p>Nenhum amigo ainda.</p><?php } ?>
    <?php foreach ($amigos as $amigo) { ?>
        <p><?php echo htmlspecialchars($amigo["nome"]); ?></p>
    <?php } ?>

    <h3>Pedidos enviados</h3>
    <?php
    $comando = $conexao->prepare("SELECT usuarios.nome FROM pendente JOIN usuarios ON usuarios.id = pendente.id_amigo WHERE pendente.id_usuario = ?");
    $comando->execute([$idUsuario]);
    $enviados = $comando->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php if (count($enviados) == 0) { ?><p>Nenhum pedido enviado.</p><?php } ?>
    <?php foreach ($enviados as $pedido) { ?>
        <p><?php echo htmlspecialchars($pedido["nome"]); ?> (aguardando)</p>
    <?php } ?>

    <h3>Solicitar amizade</h3>
    <?php
    $comando = $conexao->prepare("SELECT id, nome FROM usuarios WHERE id <> ? AND id NOT IN (SELECT id_amigo FROM amigos WHERE id_usuario = ?) AND id NOT IN (SELECT id_amigo FROM pendente WHERE id_usuario = ?) AND id NOT IN (SELECT id_usuario FROM pendente WHERE id_amigo = ?) ORDER BY nome");
    $comando->execute([$idUsuario, $idUsuario, $idUsuario, $idUsuario]);
    $usuarios = $comando->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php if (count($usuarios) == 0) { ?><p>Nenhum usuario disponivel.</p><?php } ?>
    <?php foreach ($usuarios as $pessoa) { ?>
        <form action="recebe-amizade.php" method="post">
            <?php echo htmlspecialchars($pessoa["nome"]); ?>
            <input type="hidden" name="id_amigo" value="<?php echo $pessoa['id']; ?>">
            <button type="submit" name="acao" value="solicitar">Solicitar</button>
        </form>
    <?php } ?>
</body>
</html>
