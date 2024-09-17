<?php
// Conexión a la base de datos
include 'db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos enviados desde el cliente
$data = json_decode(file_get_contents('php://input'), true);

$nombre = $data['nombre'];
$precio = $data['precio'];
$imagen = $data['imagen'];


// Insertar los datos en la tabla productos
$sql = "INSERT INTO productos (nombre, precio, imagen) 
        VALUES ('$nombre', '$precio', '$imagen')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $conn->error]);
}

$conn->close();
?>
