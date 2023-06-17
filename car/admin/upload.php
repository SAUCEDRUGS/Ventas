<?php
include "db.php";
include "class.upload.php";
// mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$handle = new Upload($_FILES["image"]);

if ($handle->uploaded) {
    $handle->Process("uploads/");

    if ($handle->processed) {
        // Usamos la función insert_img de la librería db.php
        $title = $_POST["title"];
        $folder = "uploads/";
        $name = $handle->file_dst_name;
        $price = $_POST["price"];
        $status = $_POST["status"];

        insert_img($title, $folder, $name, $price, $status);
    } else {
        echo 'Error: ' . $handle->error;
    }
} else {
    echo 'Error: ' . $handle->error;
}

unset($handle);
header("Location: index.php");
?>
