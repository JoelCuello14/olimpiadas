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

<form method="post" action="modificar_producto.php">
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $product['nombre']; ?>" required><br>
    Descripción: <textarea name="descripcion"><?php echo $product['descripcion']; ?></textarea><br>
    Precio: <input type="text" name="precio" value="<?php echo $product['precio']; ?>" required><br>
    Imagen: <input type="text" name="imagen" value="<?php echo $product['imagen']; ?>"><br>
    <input type="submit" value="Actualizar Producto">
</form>
