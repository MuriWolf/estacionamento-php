<?php

include("./connectionDB.php");

$placa = $_POST["placa"];

try {
    $stmt = $pdo->query("DELETE FROM carros WHERE placa = '$placa';");
    header("Location: ../../public/index.php");
    die();
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
