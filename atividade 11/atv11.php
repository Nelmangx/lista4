<?php
session_start();

$diasDaSemana = ["Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado", "Domingo"];

// Inicializa a sessão
if (!isset($_SESSION['vendas'])) {
    $_SESSION['vendas'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['venda'])) {
    $venda = floatval($_POST['venda']);
    $_SESSION['vendas'][] = $venda;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Vendas da Semana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">📊 Controle de Vendas Diárias</h2>

            <?php if (count($_SESSION['vendas']) < 7): ?>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Valor da venda de <strong><?= $diasDaSemana[count($_SESSION['vendas'])] ?></strong>:</label>
                        <input type="number" name="venda" step="0.01" class="form-control" required autofocus>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Registrar</button>
                </form>
                <p class="mt-3 text-center text-muted">Registradas: <?= count($_SESSION['vendas']) ?>/7</p>
            <?php else:
                // Cálculos com for
                $soma = 0;
                $maior = $_SESSION['vendas'][0];
                $quantidade = count($_SESSION['vendas']);

                for ($i = 0; $i < $quantidade; $i++) {
                    $soma += $_SESSION['vendas'][$i];
                    if ($_SESSION['vendas'][$i] > $maior) {
                        $maior = $_SESSION['vendas'][$i];
                    }
                }

                $media = $soma / $quantidade;
                ?>

                <ul class="list-group mb-4">
                    <?php for ($i = 0; $i < 7; $i++): ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <?= $diasDaSemana[$i] ?>
                            <span>R$ <?= number_format($_SESSION['vendas'][$i], 2, ',', '.') ?></span>
                        </li>
                    <?php endfor; ?>
                </ul>

                <div class="alert alert-success text-center">
                    <p><strong>Total da semana:</strong> R$ <?= number_format($soma, 2, ',', '.') ?></p>
                    <p><strong>Média diária:</strong> R$ <?= number_format($media, 2, ',', '.') ?></p>
                    <p><strong>Maior venda:</strong> R$ <?= number_format($maior, 2, ',', '.') ?></p>
                </div>
                <?php session_destroy(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
