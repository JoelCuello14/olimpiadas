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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="crearproducto.css">
    <title>Document</title>
</head>
<body>
    <div id=caja-grande>
        <div id=caja-segunda>
<form method="post" action="crear_producto.php"  enctype="multipart/form-data">
   <p>Nombre:</p>  <input type="text" name="nombre" required><br>
    <p>Descripción: </p><textarea name="descripcion"></textarea><br>
   <p> Precio: </p><input type="text" name="precio" required><br>
    <p>Imagen:</p> <input type="file" name="imagen"><br>
<div class=botones>
    <input type="submit" value="Crear Producto" class=boton>
</div>

<div class=botones>
<a href="index.php" class=boton>Volver</a>
</div>
</form>
</div>
</div>
</body>
</html>