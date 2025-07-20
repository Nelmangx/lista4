<?php
// Média de Notas (do...while).
session_start();

// Inicialização das variáveis
if (!isset($_SESSION['quantidade'])) {
    $_SESSION['quantidade'] = null;
    $_SESSION['notas'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['quantidade']) && $_SESSION['quantidade'] === null) {
        $_SESSION['quantidade'] = intval($_POST['quantidade']);
    } elseif (isset($_POST['nota'])) {
        $nota = floatval($_POST['nota']);
        $_SESSION['notas'][] = $nota;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Média de Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">📊 Média de Notas</h2>

            <?php
            if ($_SESSION['quantidade'] === null): ?>
                <form method="post">
                    <div class="mb-3">
                        <label for="quantidade" class="form-label">Quantas notas você deseja inserir?</label>
                        <input type="number" name="quantidade" id="quantidade" class="form-control" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Confirmar</button>
                </form>
            <?php elseif (count($_SESSION['notas']) < $_SESSION['quantidade']): ?>
                <form method="post">
                    <div class="mb-3">
                        <label for="nota" class="form-label">Digite a nota #<?= count($_SESSION['notas']) + 1 ?>:</label>
                        <input type="number" step="0.01" name="nota" id="nota" class="form-control" required autofocus>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Inserir nota</button>
                </form>
            <?php else:
                // Calcular a média com do...while
                $soma = 0;
                $i = 0;
                do {
                    $soma += $_SESSION['notas'][$i];
                    $i++;
                } while ($i < $_SESSION['quantidade']);

                $media = $soma / $_SESSION['quantidade'];
                ?>
                <div class="alert alert-info text-center">
                    <strong>Média Final:</strong> <?= number_format($media, 2, ',', '.') ?>
                </div>
                <?php session_destroy(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
