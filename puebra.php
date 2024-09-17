<?php
include 'db.php';

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tienda</title>
</head>
<body>
    <h1>Productos</h1>
    <ul>
        <?php while($row = $result->fetch_assoc()) { ?>
            <li>
                <h2><?php echo $row['nombre']; ?></h2>
                <p><?php echo $row['descripcion']; ?></p>
            <img src="$<?php echo $row['precio']; ?>" alt=""> 
                <form action="agregar_carrito.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="producto_id" value="<?php echo $row['id']; ?>">
                    <input type="number" name="cantidad" value="1" min="1">
                    <button type="submit">Agregar al carrito</button>
                </form>
            </li>
        <?php } ?>
    </ul>
</body>
</html>
