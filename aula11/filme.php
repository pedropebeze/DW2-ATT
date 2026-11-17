<?php
session_start();
require "conexao.php";

$idFilme = (int)($_GET["id"] ?? 0);
$comando = $conexao->prepare("SELECT filmes.*, usuarios.nome AS autor FROM filmes JOIN usuarios ON usuarios.id = filmes.id_usuario WHERE filmes.id = ?");
$comando->execute([$idFilme]);
$filme = $comando->fetch(PDO::FETCH_ASSOC);

if (!$filme) {
    die('Filme nao encontrado. <a href="filmes.php">Voltar</a>');
}

$idUsuario = $_SESSION["id_usuario"] ?? 0;

$comando = $conexao->prepare("SELECT COUNT(*) FROM curtidas WHERE id_filme = ?");
$comando->execute([$idFilme]);
$curtidas = $comando->fetchColumn();

$comando = $conexao->prepare("SELECT COUNT(*) FROM curtidas WHERE id_usuario = ? AND id_filme = ?");
$comando->execute([$idUsuario, $idFilme]);
$jaCurtiu = $comando->fetchColumn() > 0;

$comando = $conexao->prepare("SELECT COUNT(*) FROM amigos WHERE id_usuario = ? AND id_amigo = ?");
$comando->execute([$idUsuario, $filme["id_usuario"]]);
$eAmigo = $comando->fetchColumn() > 0;

$podeVerComentarios = $eAmigo || $idUsuario == $filme["id_usuario"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Filme</title>
</head>
<body>
    <p><a href="filmes.php">Voltar aos filmes</a></p>
    <h2><?php echo htmlspecialchars($filme["nome"]); ?></h2>
    <img src="<?php echo htmlspecialchars($filme["foto"]); ?>" width="200" alt="Foto do filme">
    <p><?php echo nl2br(htmlspecialchars($filme["descricao"])); ?></p>
    <p>Sugerido por: <?php echo htmlspecialchars($filme["autor"]); ?></p>
    <p>Classificacao: <?php echo $filme["classificacao"] == 0 ? 'L' : $filme["classificacao"] . ' anos'; ?></p>
    <p>Nota: <?php echo $filme["nota_usuario"]; ?>/10</p>
    <p><a href="<?php echo htmlspecialchars($filme["link"]); ?>" target="_blank" rel="noopener">Link do filme</a></p>

    <h3>Curtidas: <?php echo $curtidas; ?></h3>
    <?php if ($idUsuario) { ?>
        <form action="recebe-curtida.php" method="post">
            <input type="hidden" name="id_filme" value="<?php echo $idFilme; ?>">
            <input type="submit" value="<?php echo $jaCurtiu ? 'Descurtir' : 'Curtir'; ?>">
        </form>
    <?php } else { ?>
        <p><a href="envio-login.php">Entre para curtir</a></p>
    <?php } ?>

    <h3>Comentarios</h3>
    <?php if (!$podeVerComentarios) { ?>
        <p>Somente o autor e seus amigos podem ver os comentarios.</p>
    <?php } else { ?>
        <?php if ($eAmigo) { ?>
            <form action="recebe-comentario.php" method="post">
                <input type="hidden" name="id_filme" value="<?php echo $idFilme; ?>">
                <textarea name="comentario" rows="3" cols="40" maxlength="300" required></textarea><br>
                <input type="submit" value="Comentar">
            </form>
        <?php } ?>
        <?php
        $comando = $conexao->prepare("SELECT usuarios.nome, comentarios.comentario FROM comentarios JOIN usuarios ON usuarios.id = comentarios.id_usuario WHERE comentarios.id_filme = ? ORDER BY comentarios.id DESC");
        $comando->execute([$idFilme]);
        $comentarios = $comando->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php if (count($comentarios) == 0) { ?>
            <p>Nenhum comentario ainda.</p>
        <?php } ?>
        <?php foreach ($comentarios as $c) { ?>
            <p><b><?php echo htmlspecialchars($c["nome"]); ?>:</b> <?php echo nl2br(htmlspecialchars($c["comentario"])); ?></p>
        <?php } ?>
    <?php } ?>
</body>
</html>
