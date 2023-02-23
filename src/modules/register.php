<?php
include("./connectionDB.php");

$placa = $_POST["placa"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$entrada = $_POST["entrada"];

try {
    $stmt = $pdo->prepare('INSERT INTO carros (placa, marca, modelo, horarioEntrada) VALUES(:placa, :marca, :modelo, :entrada)');
    $stmt->execute(array(
        ':placa' => $placa,
        ':marca' => $marca,
        ':modelo' => $modelo,
        ':entrada' => $entrada,
    ));
    header("Location: ../../public/index.php");
    die();
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
