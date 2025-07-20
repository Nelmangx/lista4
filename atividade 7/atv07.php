<?php
// Soma de Números Digitados (while).
session_start();

if (!isset($_SESSION['soma'])) {
    $_SESSION['soma'] = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = intval($_POST['numero']);

    if ($numero != 0) {
        $_SESSION['soma'] += $numero;
    } else {
        $fim = true;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Soma de Números</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">🔢 Soma de Números Digitados</h2>

            <?php if (isset($fim) && $fim): ?>
                <div class="alert alert-success text-center">
                    <strong>Soma total:</strong> <?= $_SESSION['soma'] ?>
                </div>
                <?php session_destroy(); ?>
            <?php else: ?>
                <form method="post" class="mb-3">
                    <div class="mb-3">
                        <label for="numero" class="form-label">Digite um número:</label>
                        <input type="number" name="numero" id="numero" class="form-control" required autofocus>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar</button>
                </form>
                <p class="text-center"><strong>Soma atual:</strong> <?= $_SESSION['soma'] ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
