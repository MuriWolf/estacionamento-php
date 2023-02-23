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
    <title>marcar saída</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/header.css">
</head>

<body>
    <?php include("../../src/templates/header.php"); ?>
    <main>
        <h1>Saída</h1>
        <form action="../../src/modules/markExit.php" method="post">
            <div><label>Placa: <input type="text" name="placa" id="placa" readonly value="<?php echo ($linha['placa']) ?>"></label></div>
            <div><label>Entrada: <input type="datetime-local" name="entrada" id="entrada" readonly value="<?php echo ($linha['horarioEntrada']) ?>"></label></div>
            <div><label>Saída: <input type="datetime-local" name="saida" id="saida" required></label></div>
            <button  type="submit" class="marcarSaidaBtn-js btn">Ver preço</button>
        </form>
    </main>
</body>

<script>
    let marcarSaidaBtn = document.querySelector(".marcarSaidaBtn-js");

    marcarSaidaBtn.addEventListener("click", (e) => {
        let entrada = document.getElementById("entrada").value;
        let saida = document.getElementById("saida").value;
        if (entrada > saida && saida != "") {
            e.preventDefault();
            alert("Digite uma data de saída maior que a de entrada!")
        }
    });
</script>

</html>