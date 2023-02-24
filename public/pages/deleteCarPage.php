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
        <h1>Excluir</h1>
        <form action="../../src/modules/deleteCar.php" method="post">
            <input type="hidden" name="placa" value="<?php echo($placa);?>">
            <h2>Você realmente deseja apagar o carro de placa '<?php echo($placa); ?>'?</h2>
            <button class="btn" type="submit">Sim</button>
            <button  ><a href="../index.php">Não</a></button>
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