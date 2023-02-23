<?php
$localhost = "localhost";
$user = "root";
$password = "";
$db = "estacionamento";

$pdo = new PDO('mysql:host=localhost;dbname=estacionamento', $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>