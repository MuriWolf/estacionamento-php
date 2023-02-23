<?php

include("./connectionDB.php");

$placa = $_POST["placa"];
$horarioEntrada = $_POST["entrada"];
$horarioSaida = $_POST["saida"];

$entradaNum = strtotime($horarioEntrada);
$saidaNum = strtotime($horarioSaida);

$horasEstacionado = (($saidaNum - $entradaNum) / 60) / 60;
$valorPagar = number_format($horasEstacionado * 10, 2);

if ($entradaNum >= $saidaNum) {
    header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
    exit;
} else {
    try {
        $stmt = $pdo->prepare("UPDATE carros SET horarioSaida = :horarioSaida, valorPagar = :valorPagar WHERE placa = '$placa';");
        $stmt->execute(array(
            ':horarioSaida' => $horarioSaida,
            ':valorPagar' => $valorPagar,
        ));
        header("Location: ../../public/index.php");
        die();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
