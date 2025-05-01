<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and convert to float
    $eixoX = (float)filter_input(INPUT_POST, 'eixoX', FILTER_SANITIZE_NUMBER_FLOAT);
    $eixoY = (float)filter_input(INPUT_POST, 'eixoY', FILTER_SANITIZE_NUMBER_FLOAT);

    $areaEstrutura = 24; 
    $tamInversor = 0;
    $pReal = 0;

    $areaTotal = $eixoX * $eixoY;
    $quantEstrutura = $areaTotal / $areaEstrutura;
    $quantModulo = $quantEstrutura * 8;
    
    $tWP = $quantModulo * 610; // Potência total em Watt pico

    if ($tWP > 75000 && $tWP <= 122000) {
        $tamInversor = 75;
        $pReal = intval((($areaTotal - 3) / $areaEstrutura) * 8 * 610);

    } elseif ($tWP > 50000 && $tWP <= 75000) {
        $tamInversor = 50;
        $pReal = intval((($areaTotal - 2) / $areaEstrutura) * 8 * 610);

    } elseif ($tWP > 35000 && $tWP <= 50000) {
        $tamInversor = 35;
        $pReal = intval((($areaTotal - 2) / $areaEstrutura) * 8 * 610);

    } elseif ($tWP > 22500 && $tWP <= 35000) {
        $tamInversor = 25;
        $pReal = intval((($areaTotal - 2) / $areaEstrutura) * 8 * 610);

    } elseif ($tWP > 15000 && $tWP <= 22500) {
        $tamInversor = 15;
        $pReal = intval((($areaTotal - 2) / $areaEstrutura) * 8 * 610);

    } elseif ($tWP > 7500 && $tWP <= 15000) {
        $tamInversor = 10;
        $pReal = intval((($areaTotal - 2) / $areaEstrutura) * 8 * 610);

    } elseif ($tWP > 0 && $tWP <= 7500) {
        $tamInversor = 5;
        $pReal = intval((($areaTotal - 2) / $areaEstrutura) * 8 * 610);

    } 
    else {
        $tamInversor = "Fora do intervalo (75kW-112kW)";
        $pReal = "Fora do intervalo";
    }

    // Return to the form page (or process AJAX if needed)
    include 'index.php';
    exit;
}
?>