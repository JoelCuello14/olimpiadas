<?php
include 'db.php';

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['descripcion']; ?></td>
        <td><?php echo $row['precio']; ?></td>
        <td><img src="<?php echo $row['imagen']; ?>" width="100"></td>
        <td>
            <a href="modificar_producto.php?id=<?php echo $row['id']; ?>">Editar</a>
            <a href="eliminar_producto.php?id=<?php echo $row['id']; ?>">Eliminar</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>