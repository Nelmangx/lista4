<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Aumento Salarial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">💰 Tabela de Aumento Salarial</h2>

            <?php
            $colaboradores = [
                "Joana" => 2500.00,
                "Carlos" => 3100.50,
                "Marcos" => 2800.75,
                "Fernanda" => 4200.00,
                "Luciana" => 3900.80
            ];

            $aumentoPercentual = 0.10;
            ?>

            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Salário Original</th>
                        <th>Salário com Aumento (10%)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($colaboradores as $nome => $salario): 
                        $salarioNovo = $salario + ($salario * $aumentoPercentual);
                    ?>
                        <tr>
                            <td><?= $nome ?></td>
                            <td>R$ <?= number_format($salario, 2, ',', '.') ?></td>
                            <td>R$ <?= number_format($salarioNovo, 2, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p class="text-muted text-center">🔍 Os valores foram atualizados com base em um reajuste de 10%.</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
