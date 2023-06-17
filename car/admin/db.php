<?php
/**
 * Conexion a la base de datos y funciones
 **/
function con()
{
    return new mysqli("localhost", "root", "", "cart");
}

function insert_img($title, $folder, $image)
{
    $con = con();
    $con->query("INSERT INTO products (title, folder, src, created_at) VALUES (\"$title\", \"$folder\", \"$image\", NOW())");
}

function get_imgs()
{
    $images = array();
    $con = con();
    $query = $con->query("SELECT * FROM products ORDER BY created_at DESC");
    while ($r = $query->fetch_object()) {
        $images[] = $r;
    }
    return $images;
}

function get_img($id)
{
    $image = null;
    $con = con();
    $query = $con->query("SELECT * FROM products WHERE id=$id");
    while ($r = $query->fetch_object()) {
        $image = $r;
    }
    return $image;
}

function del($id)
{
    $con = con();
    $con->query("DELETE FROM products WHERE id=$id");
}

function update_img($id, $title, $name, $price, $status)
{
    $con = con();
    $con->query("UPDATE products SET title=\"$title\", name=\"$name\", price=\"$price\", status=\"$status\" WHERE id=$id");
}
?>
