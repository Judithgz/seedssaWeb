<?php
require "php/sesion.php";
require "php/conn.php";

if (isset($_GET["buscar"])) {
	$buscar = $_GET["buscar"];
	$sql = "SELECT * FROM productos WHERE nombre LIKE '%".$buscar."%' OR descripcion LIKE '%".$buscar."%'";
	$r = mysqli_query($conn, $sql);
	$productos = array();
	while ($data = mysqli_fetch_assoc($r)) {
		array_push($productos, $data);
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Buscar </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main.css">

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
				<li><a href="nosotros.php">Nosotros</a></li>
				<li class="active"><a href="contacto.php">Contacto</a></li>
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
	<div class="row cotent">
		<div class="col-sm-2 sidenav">
			<h4>Productos más vendidos</h4>

		</div>
		<div class="col-sm-8 text-left">
			<div class="well" id="contenedor">
				<h2 class="text-center">Resultados de búsqueda: <?php print $buscar; ?></h2><br><br>
				<?php
				for ($i=0; $i < count($productos); $i++) { 
					print '<div class="media">';
					print '<div class="media-left">';
					print '<img src="img/'.$productos[$i]["imagen"].'" class="media-object" />';
					print '</div>';
					print '<div class="media-body">';
					print '<h4 class="media-heading"><a href="producto.php?id='.$productos[$i]["id"].'">'.$productos[$i]["nombre"].'</a></h4>';
					print '<p>'.$productos[$i]["descripcion"].'</p>';
					print '</div>';
					print '</div>';
				}
				?>
			</div>
		</div>
		<div class="col-sm-2 sidenav">
			<h4>Echa un vistazo</h4>

		</div>
	</div>
</div>
<br>



<footer class="container-fluid text-center">
	<a href="aviso.php">Aviso de privacidad.</a>
</footer>

</body>
</html>
