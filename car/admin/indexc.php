<?php
// incluir archivo de configuración de la base de datos
include 'dbConfig.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Tutorial de Carrito de Compras en PHP</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 50px;}
    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}
    .banner { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Tutorial Carrito de Compras</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php">Productos</a></li>
            <li><a href="viewCart.php">Carrito</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="banner">
        <h2>¡Bienvenido a nuestra tienda en línea!</h2>
    </div>
    <h1 class="text-center">Productos</h1>
    <a href="viewCart.php" class="cart-link" title="Ver Carrito"><i class="glyphicon glyphicon-shopping-cart"></i></a>
    <div id="products" class="row list-group">
        <?php
        // consulta para obtener los productos
        $query = $db->query("SELECT * FROM products ORDER BY id DESC LIMIT 10");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
        <div class="item col-lg-4">
            <div class="thumbnail">
                <center><h4 class="list-group-item-heading"><?php echo $row["name"]; ?></h4></center>
                <img src="<?php echo isset($row["folder"]) && isset($row["src"]) ? $row["folder"].$row["src"] : ''; ?>" alt="Imagen del Producto" class="img-responsive" style="width:240px;">

                <div class="caption">
                    <p class="text-center"><?php echo '$'.$row["price"].' USD'; ?></p>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Agregar al carrito</a>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-primary" href="productDetails.php?id=<?php echo $row["id"]; ?>">Detalles</a>
                        </div>
                    </div>
                    <p class="list-group-item-text"><?php echo $row["description"]; ?></p>
                </div>
            </div>
        </div>
        <?php } }else{ ?>
        <p>No se encontraron productos.....</p>
        <?php } ?>
    </div>
</div>
</body>
</html>
