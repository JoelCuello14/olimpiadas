<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];

    // Verificar si el producto ya está en el carrito
    $sql = "SELECT * FROM carrito WHERE producto_id = '$producto_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si ya existe, actualizar la cantidad
        $row = $result->fetch_assoc();
        $nueva_cantidad = $row['cantidad'] + $cantidad;
        $sql = "UPDATE carrito SET cantidad = '$nueva_cantidad' WHERE producto_id = '$producto_id'";
    } else {
        // Si no existe, agregar una nueva entrada
        $sql = "INSERT INTO carrito (producto_id, cantidad) VALUES ('$producto_id', '$cantidad')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Producto agregado al carrito!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<a href="ver_carrito.php">Ver carrito</a>
