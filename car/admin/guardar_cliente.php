<?php
// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cart";

$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Obtener los valores del formulario
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$created = $_POST['created'];
$modified = $_POST['modified'];
$status = $_POST['status'];

// Formatear las fechas en el formato correcto
$created = date('Y-m-d H:i:s', strtotime($created));
$modified = date('Y-m-d H:i:s', strtotime($modified));

// Insertar los valores en la tabla customers
$sql = "INSERT INTO customers (name, email, phone, address, created, modified, status)
        VALUES ('$name', '$email', '$phone', '$address', '$created', '$modified', '$status')";

if ($conexion->query($sql) === TRUE) {
    echo "El cliente se ha guardado correctamente.";
} else {
    echo "Error al guardar el cliente: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
