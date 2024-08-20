<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="modificar.css">
</head>
<body>
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];

    $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', imagen='$imagen' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Producto actualizado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Formulario para editar producto
$id = $_GET['id'];
$sql = "SELECT * FROM productos WHERE id=$id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>
<div id=caja-grande>
    <div id=caja-segunda>
<form method="post" action="modificar_producto.php">
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
    <p>Nombre: </p><input type="text" name="nombre" value="<?php echo $product['nombre']; ?>" required><br>
   <p> Descripción:</p> <textarea name="descripcion"><?php echo $product['descripcion']; ?></textarea><br>
    <p>Precio:</p> <input type="text" name="precio" value="<?php echo $product['precio']; ?>" required><br>
   <p> Imagen: </p><input type="text" name="imagen" value="<?php echo $product['imagen']; ?>"><br>


   <div class=botones>
    <input type="submit" value="Modificar Producto" class=boton>
</div>

<div class=botones>
<a href="index.php" class=boton>Volver</a>
</form>
</div>
</div>
</body>
</html>