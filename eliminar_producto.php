<?php
include 'db.php';

if (isset($_GET['id'])) {
    // Obtener el ID y asegurarse de que es un entero
    $id = intval($_GET['id']);
    
    // Preparar la consulta SQL
    $stmt = $conn->prepare("DELETE FROM productos WHERE id = ?");
    
    // Asociar el parámetro a la consulta
    $stmt->bind_param("i", $id);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Producto eliminado con éxito";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>
