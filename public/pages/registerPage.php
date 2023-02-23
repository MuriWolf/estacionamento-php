<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/header.css">
</head>

<body>
    <?php include("../../src/templates/header.php"); ?>
    <main>
        <h1>Cadastro de veículo</h1>
        <form action="../../src/modules/register.php" method="post">
            <div><label>Placa: <input type="text" name="placa" id="placa" required></label></div>
            <div><label>Marca: <input type="text" name="marca" id="marca" required></label></div>
            <div><label>Modelo: <input type="text" name="modelo" id="modelo" required></label></div>
            <div><label>Entrada: <input type="datetime-local" name="entrada" id="entrada" required></label></div>
            <button class="btn" type="submit">Enviar</button>
        </form>
    </main>
</body>

</html>