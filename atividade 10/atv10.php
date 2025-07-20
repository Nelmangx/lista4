
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">🛒 Lista de Produtos e Preços</h2>

            <?php
            $produtos = [
                "Teclado Gamer" => 199.90,
                "Mouse Óptico" => 89.50,
                "Monitor LED 24\"" => 749.00,
                "Notebook Intel i5" => 3499.99,
                "Fone de Ouvido Bluetooth" => 149.00
            ];
            ?>

            <ul class="list-group">
                <?php foreach ($produtos as $nome => $preco): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= $nome ?>
                        <span class="badge bg-primary rounded-pill">
                            R$ <?= number_format($preco, 2, ',', '.') ?>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
