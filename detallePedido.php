<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles Pedido</title>
</head>

<body>
    <!-- importar archivo de dbconfig.php -->
    <?php include 'dbconfig.php'; ?>

    <h1>Detalles del Pedido</h1>

    <?php
    // obtener el id del pedido de la URL
    $order_id = $_GET['id'];

    // preparar la consulta SQL para obtener los detalles del pedido
    $query = "SELECT * FROM order_details JOIN cards ON order_details.card_id = cards.id  WHERE order_id = 1";

    // ejecutar la consulta SQL
    $result = mysqli_query($conn, $query);
    ?>
    <!-- crear tabla con detalles de pedido -->
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Carta</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php


            // recorrer los resultados de la consulta
            while ($row = mysqli_fetch_assoc($result))
            {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                //show image of the card in the table from image_uri_normal and set its max size to 100px
                echo "<td><img src='" . $row['image_uri_normal'] . "' style='max-width: 200px;'></td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['price_usd'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>