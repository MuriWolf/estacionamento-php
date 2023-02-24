<?php
include("../src/modules/returnCarData.php");

function showExit($linha, $linkMarkExit) {
    if ($linha['valorPagar'] == null && $linha['horarioSaida'] == null) {
        echo ("<td><a href='$linkMarkExit'>Marcar saída</a></td>");
    } else {
        echo("<td> </td>");
    }
}

function showDelete($linha, $deleteCar) {
    if ($linha['valorPagar'] != null && $linha['horarioSaida'] !== null) {
        echo ("<td><a href='$deleteCar'>Excluir</a></td>");
    } else {
        echo("<td> </td>");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/header.css">
    <link rel="stylesheet" href="./style/table.css"> 
    <link rel="stylesheet" href="./style/modal.css"> 
</head>

<body>
    <?php include("../src/templates/header.php"); ?>
    <main>
        <h1>R$10 por hora!</h1>
        <table>
            <tr>
                <th>placa</th>
                <th>marca</th>
                <th>modelo</td>
                <th>horario de entrada</th>
                <th>horario de saida</th>
                <th>valor a pagar</th>
                <th>Editar</th>
                <th>Marcar saída</th>
                <th>Apagar</th>
            </tr>
            <?php
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $linkCarDetails = "http://localhost/estacionamento-php/public/pages/CarDetailsPage.php?placa={$linha['placa']}";
                $linkMarkExit = "http://localhost/estacionamento-php/public/pages/exitPage.php?placa={$linha['placa']}";
                $deleteCar = "http://localhost/estacionamento-php/public/pages/deleteCarPage.php?placa={$linha['placa']}";
                $valorPagar = number_format($linha['valorPagar'], 2, ',');

                echo ("<tr>");
                    echo "<td>{$linha['placa']}</td>";
                    echo ("<td>{$linha['marca']}</td>");
                    echo ("<td>{$linha['modelo']}</td>");
                    echo ("<td>{$linha['horarioEntrada']}</td>");
                    echo ("<td>{$linha['horarioSaida']}</td>");
                    echo ("<td>R$ $valorPagar</td>");
                    echo ("<td class='td-center' text-align='center'><a href='$linkCarDetails'>Editar</a> </td>");
                    showExit($linha, $linkMarkExit);
                    showDelete($linha, $deleteCar);
                echo ("</tr>");
            }
            include("../src/templates/exitModal.php");
            ?>
        </table>

    </main>
</body>

</html>