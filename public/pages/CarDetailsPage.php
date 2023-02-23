<?php
include("../../src/modules/connectionDB.php");

$placa = $_GET["placa"];

$consulta = $pdo->query("SELECT * FROM carros WHERE placa = '$placa'");
$linha = $consulta->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar detalhes carro</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/header.css">
</head>

<body>
    <?php include("../../src/templates/header.php"); ?>
    <main>
        <h1>detalhes</h1>
        <form action="../../src/modules/updateCarData.php" method="post">
            <input type="hidden" name="placaAntiga" value="<?php echo ($linha['placa']) ?>" id="placaAntiga">
            <div><label>Nova Placa: <input type="text" name="placaNova" value="<?php echo ($linha['placa']) ?>" id="placaNova"></label></div>
            <div><label>Nova Marca: <input type="text" name="marca" value="<?php echo ($linha['marca']) ?>" id="marca"></label></div>
            <div><label>Nova Modelo: <input type="text" name="modelo" value="<?php echo ($linha['modelo']) ?>" id="modelo"></label></div>
            <button type="submit" class="btn">Enviar</button>
        </form>
        <?php
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<strong>placa</strong>: {$linha['placa']} <strong>marca</strong>: {$linha['marca']} <strong>modelo</strong>: {$linha['modelo']} <strong>horario de entrada</strong>: {$linha['horarioEntrada']}";
        }
        ?>
    </main>
</body>

</html>