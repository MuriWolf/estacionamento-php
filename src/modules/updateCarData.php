<?php

include("./connectionDB.php");

$placaNova = $_POST["placaNova"];
$placaAntiga = $_POST["placaAntiga"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];


try {
    $stmt = $pdo->prepare("UPDATE carros SET placa = :placaNova, marca = :marca, modelo = :modelo WHERE placa = '$placaAntiga';");
    $stmt->execute(array(
        ':placaNova' => $placaNova,
        ':marca' => $marca,
        ':modelo' => $modelo,
    ));
    header("Location: ../../public/index.php");
    die();
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
