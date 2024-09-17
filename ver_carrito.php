<?php
include 'db.php';

$sql = "SELECT carrito.id, productos.nombre, productos.precio, carrito.cantidad
        FROM carrito
        JOIN productos ON carrito.producto_id = productos.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Carrito de Compras</h1>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total = 0;
            while ($row = $result->fetch_assoc()) { 
                $subtotal = $row['precio'] * $row['cantidad'];
                $total += $subtotal;
            ?>
                <tr>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['cantidad']; ?></td>
                    <td>$<?php echo $row['precio']; ?></td>
                    <td>$<?php echo $subtotal; ?></td>
                    <td>
                        <form action="eliminar_carrito.php" method="post">
                            <input type="hidden" name="carrito_id" value="<?php echo $row['id']; ?>">
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <h3>Total: $<?php echo $total; ?></h3>
    <a href="puebra.php">Seguir comprando</a>
</body>
</html>