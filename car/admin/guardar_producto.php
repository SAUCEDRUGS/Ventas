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

// Verificar si se enviaron todos los campos requeridos
if (isset($_POST['name'], $_POST['description'], $_POST['price'], $_POST['created'], $_POST['modified'], $_POST['status'])) {
    // Obtener los valores del formulario
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $created = $_POST['created'];
    $modified = $_POST['modified'];
    $status = $_POST['status'];

    // Formatear las fechas en el formato correcto
    $created = date('Y-m-d H:i:s', strtotime($created));
    $modified = date('Y-m-d H:i:s', strtotime($modified));

    // Escapar los valores para evitar inyección de SQL
    $name = $conexion->real_escape_string($name);
    $description = $conexion->real_escape_string($description);
    $price = floatval($price); // Asegurar que el precio sea un número decimal

    // Insertar los valores en la tabla products
    $sql = "INSERT INTO products (name, description, price, created, modified, status)
            VALUES ('$name', '$description', $price, '$created', '$modified', '$status')";

    if ($conexion->query($sql) === TRUE) {
        echo "El producto se ha guardado correctamente.";
    } else {
        echo "Error al guardar el producto: " . $conexion->error;
    }
} else {
    echo "No se han enviado todos los campos requeridos del formulario.";
}

// Cerrar la conexión
$conexion->close();
?>
