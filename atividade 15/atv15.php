<?php
session_start();

// Inicializa o número secreto se ainda não existir
if (!isset($_SESSION['numero_secreto'])) {
    $_SESSION['numero_secreto'] = rand(1, 20);
    $_SESSION['tentativas'] = 0;
}

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['palpite'])) {
    $palpite = intval($_POST['palpite']);
    $_SESSION['tentativas']++;

    // Dica de resposta
    if ($palpite < $_SESSION['numero_secreto']) {
        $mensagem = "🔻 Tente um número maior!";
    } elseif ($palpite > $_SESSION['numero_secreto']) {
        $mensagem = "🔺 Tente um número menor!";
    } else {
        $mensagem = "🎉 Parabéns! Você acertou em {$_SESSION['tentativas']} tentativa(s).";
        $acertou = true;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Jogo da Adivinhação</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">🕵️‍♂️ Jogo da Adivinhação</h2>

            <?php if (!isset($acertou)): ?>
                <form method="post">
                    <div class="mb-3">
                        <label for="palpite" class="form-label">Digite um número entre 1 e 20:</label>
                        <input type="number" name="palpite" id="palpite" class="form-control" min="1" max="20" required autofocus>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Tentar</button>
                </form>
            <?php else: ?>
                <div class="alert alert-success text-center"><?= $mensagem ?></div>
                <?php session_destroy(); ?>
            <?php endif; ?>

            <?php if ($mensagem && !isset($acertou)): ?>
                <div class="alert alert-info text-center mt-3"><?= $mensagem ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
