<?php
require "php/sesion.php";
require "php/conn.php";

$sql = "SELECT * FROM productos WHERE tipo='1'";
$r = mysqli_query($conn, $sql);
$productos = array();
while ($row = mysqli_fetch_array($r)) {
	array_push($productos, $row);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Diviertete </title>
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
				<li class="active"><a href="diversion.php">Diversión</a></li>
				<li><a href="cursos.php">Cursos</a></li>
				<li><a href="nosotros.php">Nosotros</a></li>
				<li><a href="contacto.php">Contacto</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php
					require "php/navbar.php";
				?>
			</ul>
		</div>
	</div>
</nav>

<div class="jumbotron">
	<div class="cotainer text-center">
		<h2> Busca y experimenta.</h2>
		<p>¡Tenemos los mejores artículos para ti!</p>
	</div>
</div>



<div class="container-fluid bg-3 text-center">
<?php
	$ren = 0;
	for ($i=0; $i < count($productos) ; $i++) { 
		if ($ren==0) {
			print '<div class="row">';
		}
		print '<div class="col-sm-3">';
		print '<p><a href="producto.php?id='.$productos[$i]["id"].'">'.$productos[$i]["nombre"].'</a></p>';
		print '<img src="img/'.$productos[$i]["imagen"].'" class="img-responsive img-rounded" style="width:100%" alt="'.$productos[$i]["nombre"].'">';
		print '<p>'.$productos[$i]["descripcion"].'</p>';
		print '<a href="producto.php?id='.$productos[$i]["id"].'" class="btn btn-info">$'.$productos[$i]["precio"].'</a>';
		print '</div>';
		$ren++;
		if ($ren==4) {
			$ren = 0;
			print "</div>";
		}
	}
	print '<br><br>';
?>
</div><br>


<footer class="container-fluid text-center">
	<p>Todos los derechos reservados &copy;</p>
	<p>SEEDSSA 2023</p>
	<form action="busca.php" class="form-inline" method="get">Buscar:  
		<input type="text" name="buscar" id="buscar" class="form-control" size="50" placeholder="Buscar un producto">
		<button type="submit" class="btn btn-info">Ir</button>
	</form>
</footer>

</body>
</html>
