<?php

include("../src/modules/connectionDB.php");
$consulta = $pdo->query("SELECT * FROM carros;");
