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

    if ($tWP > 112500){
        $exception = "Seu terreno é grande demais para uma usina de microgeração. Caso deseje utilizar um transformador, essa funcionalidade de calculo ainda será implementada. Enquanto isso, segue abaixo o planejamento da usina de 75 kWp, que deixará uma área excedente no seu terreno.";
        $tamInversor = 75;
        $pReal = intval(((552 - 6) / $areaEstrutura) * 8 * 610);
        $quantModulo = 184;

    } elseif ($tWP > 75000 && $tWP <= 112500) {
        $tamInversor = 75;
        $pReal = intval((($areaTotal - 6) / $areaEstrutura) * 8 * 610);
        $quantModulo = intval($quantModulo);

    } elseif ($tWP > 50000 && $tWP <= 75000) {
        $tamInversor = 50;
        $pReal = intval((($areaTotal - 6) / $areaEstrutura) * 8 * 610);
        $quantModulo = intval($quantModulo);

    } elseif ($tWP > 35000 && $tWP <= 50000) {
        $tamInversor = 35;
        $pReal = intval((($areaTotal - 6) / $areaEstrutura) * 8 * 610);
        $quantModulo = intval($quantModulo);

    } elseif ($tWP > 22500 && $tWP <= 35000) {
        $tamInversor = 25;
        $pReal = intval((($areaTotal - 6) / $areaEstrutura) * 8 * 610);
        $quantModulo = intval($quantModulo);

    } elseif ($tWP > 15000 && $tWP <= 22500) {
        $tamInversor = 15;
        $pReal = intval((($areaTotal - 6) / $areaEstrutura) * 8 * 610);
        $quantModulo = intval($quantModulo);

    } elseif ($tWP > 7500 && $tWP <= 15000) {
        $tamInversor = 10;
        $pReal = intval((($areaTotal - 6) / $areaEstrutura) * 8 * 610);
        $quantModulo = intval($quantModulo);

    } elseif ($tWP > 0 && $tWP <= 7500) {
        $tamInversor = 5;
        $pReal = intval((($areaTotal - 6) / $areaEstrutura) * 8 * 610);
        $quantModulo = intval($quantModulo);

    } 
    else {
        $tamInversor = "Fora do intervalo (75kW-112kW)";
        $pReal = "Fora do intervalo";
    }

    include 'index.php';
    exit;
}
?>