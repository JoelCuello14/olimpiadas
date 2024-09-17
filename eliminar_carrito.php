<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $carrito_id = $_POST['carrito_id'];

    $sql = "DELETE FROM carrito WHERE id = '$carrito_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Producto eliminado del carrito.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<a href="ver_carrito.php">Volver al carrito</a>

