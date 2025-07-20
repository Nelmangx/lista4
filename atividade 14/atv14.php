<?php
session_start();

// Inicializa variável de validação
if (!isset($_SESSION['numeroValido'])) {
    $_SESSION['numeroValido'] = false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = intval($_POST['numero']);

    if ($numero >= 1 && $numero <= 10) {
        $_SESSION['numeroValido'] = true;
        $mensagem = "✅ Número válido recebido: $numero";
    } else {
        $mensagem = "❌ Número inválido. Digite um valor entre 1 e 10.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Validador de Entrada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">🧪 Validador de Número com do...while</h2>

            <?php
            // Simula o loop do...while com sessão
            if (!$_SESSION['numeroValido']):
            ?>

                <form method="post">
                    <div class="mb-3">
                        <label for="numero" class="form-label">Digite um número entre 1 e 10:</label>
                        <input type="number" name="numero" id="numero" class="form-control" required autofocus>
                    </div>
                    <button type="submit" class="btn btn-warning w-100">Validar</button>
                </form>

                <?php if (isset($mensagem)): ?>
                    <div class="alert alert-danger mt-3 text-center"><?= $mensagem ?></div>
                <?php endif; ?>

            <?php else: ?>
                <div class="alert alert-success text-center">
                    <?= $mensagem ?>
                </div>
                <?php session_destroy(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
