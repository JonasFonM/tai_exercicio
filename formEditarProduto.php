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
        $objBD->update($_POST);
        header("Location: listarProduto.php");
    }

    $objProduto = $objBD->find($_GET['id']);
    ?>

    <form action="formEditarProduto.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        
        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo $objProduto->nome; ?>"> <br>

        <label>Tipo</label>
        <input type="text" name="tipo" value="<?php echo $objProduto->tipo; ?>"> <br>

        <label>Valor Unitário</label>
        <input type="text" name="valor_unitario" value="<?php echo $objProduto->valor_unitario; ?>"> <br>

        <label>Marca</label>
        <input type="text" name="marca" value="<?php echo $objProduto->marca; ?>"> <br>

        <input type="submit" value="Editar">
    </form>
</body>

</html>