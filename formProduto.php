<?php
include 'BD.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php

    $objBD = new BD();
    $objBD->connection();

    if (!empty($_POST)) {
        $objBD->insert($_POST);
        header("Location: listarProduto.php");
    }
    ?>

    <form action="formProduto.php" method="POST">
        <label>Nome</label>
        <input type="text" name="nome"> <br>

        <label>Tipo</label>
        <input type="text" name="tipo"> <br>

        <label>Valor Unitario</label>
        <input type="text" name="valor_unitario"> <br>

        <label>Marca</label>
        <input type="text" name="marca"> <br>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>