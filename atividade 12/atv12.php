<?php
session_start();

// Inicializa o array de valores
if (!isset($_SESSION['valores'])) {
    $_SESSION['valores'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['valor'])) {
    $valor = floatval($_POST['valor']);
    $_SESSION['valores'][] = $valor;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Multiplicação Acumulada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">✖️ Multiplicação Acumulada</h2>

            <?php if (count($_SESSION['valores']) < 5): ?>
                <form method="post">
                    <div class="mb-3">
                        <label for="valor" class="form-label">Digite o valor #<?= count($_SESSION['valores']) + 1 ?>:</label>
                        <input type="number" step="0.01" name="valor" id="valor" class="form-control" required autofocus>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Registrar Valor</button>
                </form>
                <p class="mt-3 text-center text-muted">Valores registrados: <?= count($_SESSION['valores']) ?>/5</p>
            <?php else:
                // Multiplicação acumulada com while
                $produto = 1;
                $i = 0;
                while ($i < 5) {
                    $produto *= $_SESSION['valores'][$i];
                    $i++;
                }
                ?>

                <ul class="list-group mb-4">
                    <?php foreach ($_SESSION['valores'] as $index => $v): ?>
                        <li class="list-group-item">
                            Valor #<?= $index + 1 ?>: <?= number_format($v, 2, ',', '.') ?>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="alert alert-success text-center">
                    <strong>Resultado da multiplicação:</strong><br>
                    <?= number_format($produto, 2, ',', '.') ?>
                </div>
                <?php session_destroy(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
