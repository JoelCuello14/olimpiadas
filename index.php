<?php
session_start();
include 'db.php';

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

// Obtener los productos de la base de datos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
    <link rel="stylesheet" type="text/css" href="styles_coquette.css">
</head>
<body>
    <div class="container">
        <h2>Lista de Productos</h2>
        <a href="carrito.php">Ver Carrito</a>
        <div class="productos">
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="producto">
                    <img src="<?php echo $row['imagen']; ?>" alt="<?php echo $row['nombre']; ?>">
                    <h3><?php echo $row['nombre']; ?></h3>
                    <p><?php echo $row['descripcion']; ?></p>
                    <p>$<?php echo $row['precio']; ?></p>
                    <form method="post" action="agregar_carrito.php">
                        <input type="hidden" name="producto_id" value="<?php echo $row['id']; ?>">
                        <input type="submit" value="Agregar al Carrito">
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
