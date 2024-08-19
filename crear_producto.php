<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];

    $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES ('$nombre', '$descripcion', '$precio', '$imagen')";

    if ($conn->query($sql) === TRUE) {
        echo "Producto creado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post" action="crear_producto.php">
    Nombre: <input type="text" name="nombre" required><br>
    Descripción: <textarea name="descripcion"></textarea><br>
    Precio: <input type="text" name="precio" required><br>
    Imagen: <input type="text" name="imagen"><br>
    <input type="submit" value="Crear Producto">
</form>
