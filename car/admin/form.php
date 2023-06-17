<html>
	<head>
		<title>Subir Multiples Imagenes y/o Archivos</title>
	  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	</head>
	<body>	
		<?php include("navbar.php");?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">		
					<h1>Subir imagenes o archivos</h1>
					<form enctype="multipart/form-data" method="post" action="upload.php">
			  			<div class="form-group">
						    <label for="exampleInputPassword1">Texto a mostrar</label>
						    <input type="text"  name="title" class="form-control"  placeholder="Texto a mostrar">
			  			</div>
						  <div class="form-group">
						<label for="exampleInputPassword1">Nombre del archivo</label>
						<input type="text" name="name" class="form-control" placeholder="Nombre del archivo" required>
					</div>
						<div class="form-group">
						    <label for="exampleInputFile">Imagen</label>
						    <input type="file" name="image" required>
					  	</div>
						
					<div class="form-group">
						<label for="exampleInputPassword1">Estado</label>
						<select name="status" class="form-control" required>
							<option value="1">Activo</option>
							<option value="0">Inactivo</option>
						</select>
					</div>
						<input type="submit" value="Subir imagen" class="btn btn-primary">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
