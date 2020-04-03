<?php
include 'BD.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="formProduto.php" method="POST">
        <label>Cadastar Produto</label>
        <input type="submit" value="Novo">
    </form>
    <?php
    $objBD = new BD();
    $objBD->connection();
    $result = $objBD->selectAll();

    echo"
    <table>
    <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Marca</th>
    <th>Ação</th>
    </tr>";

    foreach ($result as $item) {
        echo "
    <tr>
    <td>" . $item['id'] . "</td>
    <td>" . $item['nome'] . "</td>
    <td>" . $item['marca'] . "</td>
    <td><a href='formEditarProduto.php?id=" . $item['id'] . "'>Editar</a></td>
    </tr>
    ";
    }
    echo "</table>";

    ?>
</body>

</html>