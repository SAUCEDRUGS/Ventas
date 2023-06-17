<?php
include "db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $image = get_img($id);
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $description = $_POST['description'];

    // Actualizar los campos en la base de datos
    update_img($id, $title, $name, $price, $status, $description);

    // Redireccionar a la página principal
    header("Location: index.php");
    exit();
}

?>

<html>
<head>
    <title>Editar Imagen - Evilnapsis</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>

<?php include("navbar.php");?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Editar Imagen</h1>
            <form method="post" action="">
                <input type="hidden" name="id" value="<?php echo $image->id; ?>">
                <div class="form-group">
                    <label for="exampleInputPassword1">Texto a mostrar</label>
                    <input type="text" name="title" class="form-control" placeholder="Texto a mostrar" value="<?php echo $image->title; ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nombre del archivo</label>
                    <input type="text" name="name" class="form-control" placeholder="Nombre del archivo" value="<?php echo $image->name; ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Precio</label>
                    <input type="text" name="price" class="form-control" placeholder="Precio" value="<?php echo $image->price; ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Estado</label>
                    <select name="status" class="form-control" required>
                        <option value="1" <?php echo $image->status == 1 ? 'selected' : ''; ?>>Activo</option>
                        <option value="0" <?php echo $image->status == 0 ? 'selected' : ''; ?>>Inactivo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Descripción</label>
                    <textarea name="description" class="form-control" placeholder="Descripción" required><?php echo $image->description; ?></textarea>
                </div>
                <input type="submit" name="update" value="Actualizar" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
</body>
</html>
