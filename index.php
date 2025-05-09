<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Solar - Dimensionamento de Usina Fotovoltaica</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header class="solar-header">
        <div class="header-content">
            <h1><i class="fas fa-solar-panel"></i> Calculadora Solar</h1>
            <p>Dimensionamento de Usina Fotovoltaica</p>
        </div>
        <div class="sun-animation"></div>
    </header>

    <main class="container">
        <div class="calculator-card">
            <div class="panel-icon">
                <i class="fas fa-solar-panel"></i>
            </div>
            <h2>Calculadora de Tamanho de Usina PV</h2>
            <p class="subtitle">Preencha as dimensões do seu terreno para calcular o potencial solar</p>
            
            <form action="calculator.php" method="post" class="solar-form">
                <div class="input-group">
                    <label for="eixoX"><i class="fas fa-ruler-horizontal"></i> Largura do terreno (metros)</label>
                    <input type="number" step="0.01" name="eixoX" id="eixoX" placeholder="Ex: 10.5" required>
                </div>
                
                <div class="input-group">
                    <label for="eixoY"><i class="fas fa-ruler-vertical"></i> Comprimento do terreno (metros)</label>
                    <input type="number" step="0.01" name="eixoY" id="eixoY" placeholder="Ex: 20.3" required>
                </div>
                
                <button type="submit" name="acao" class="calculate-btn">
                    <i class="fas fa-calculator"></i> Calcular Potencial Solar
                </button>
            </form>
        </div>

        <?php if (isset($tamInversor) || isset($pReal) || isset($exception)): ?>
        <div class="result-card">
            <h3><i class="fas fa-chart-line"></i> Resultados do Dimensionamento</h3>
            
            <?php if (isset($exception)): ?>
                <div class="result-item">
                    <span> <?php echo $exception . "<br>"; ?> </span>
                </div>
            <?php endif; ?>

            <?php if (isset($tamInversor)): ?>
                <div class="result-item">
                    <span class="result-label">Tamanho do Inversor:</span>
                    <span class="result-value"><?php echo (int)$tamInversor; ?> kWp</span>
                </div>
            <?php endif; ?>
            
            <?php if (isset($pReal) && is_numeric($pReal)): ?>
                <div class="result-item">
                    <span class="result-label">Potência Real:</span>
                    <span class="result-value"><?php echo "<span>± </span>" . (int)$pReal; ?> kWp</span>
                </div>
            <?php endif; ?>

            <?php if (isset($quantModulo)): ?>
                <div class="result-item">
                    <span class="result-label">Quantidade de modulos de 610W:</span>
                    <span class="result-value"><?php echo "<span>± </span>" . $quantModulo; ?></span>
                </div>
            <?php endif; ?>
            
            <div class="sun-energy">
                <i class="fas fa-sun"></i>
                <p>Energia limpa e sustentável para seu futuro!</p>
            </div>
        </div>
        <?php endif; ?>
    </main>

    <footer class="solar-footer">
        <p>© <?php echo date("Y"); ?> Calculadora Solar - Todos os direitos reservados</p>
        <p>Energia renovável para um mundo mais sustentável</p>
    </footer>
</body>
</html>