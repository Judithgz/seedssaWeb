<?php
require "php/sesion.php";
require "php/conn.php";
require "php/carritofunciones.php";

if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$sql = "SELECT * FROM productos WHERE id=".$id;
	$r = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($r);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Cursos </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>

</head>
<body>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand">SEEDSSA</a>
		</div>
		<div class="collapse navbar-collapse" id="menu">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Inicio</a></li>
				<li><a href="diversion.php">Diversión</a></li>
				<li><a href="cursos.php">Cursos</a></li>
				<li><a href="index.php">Nosotros</a></li>
				<li><a href="index.php">Contacto</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php
					require "php/navbar.php";
				?>
			</ul>
		</div>
	</div>
</nav>


<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-2 sidenav">
			<img src="img/<?php print $data['imagen']; ?>" class="media-object img-resposvive" width="100%"/>
			<br>
			<h4>Núm. producto: <?php print $data['id']; ?></h4>
			<h4>Precio: $<?php print $data['precio']; ?></h4>
			<br><br>

			<a href="carrito.php?id=<?php print $id; ?>" class="btn btn-success" role="button">Carrito</a>
			<a href="index.php" class="btn btn-info" role="button">Regresar</a>
			</div>
			<div class="col-sm-8 text-left">
			<h2><?php print $data['nombre']; ?></h2>
			<br>
			<h4>Descripción:</h4>		
			<p><?php print $data['descripcion']; ?></p>
			<?php
			if ($data['tipo']=="0") {
				print '<h4>Aquién va dirigido:</h4>';
				print '<p>'.$data['publico'].'</p>';
				print '<h4>Objetivos:</h4>';
				print '<p>'.$data['objetivo'].'</p>';
				print '<h4>Qué es necesario:</h4>';
				print '<p>'.$data['necesario'].'</p>';
			} 
			?>
			</div>

		<div class="col-sm-2 sidenav">
			<div id="contacto2">
				<h4></h4>
			</div>
		</div>
	</div>
</div>
<br>



<footer class="container-fluid text-center">
	<a href="aviso.php">Aviso de privacidad.</a>
</footer>

</body>
</html>
