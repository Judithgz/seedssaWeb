<?php
require "php/sesion.php";
require "php/conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Gracias </title>
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
			<div class="well"> Lubricante sabor cereza
				<a href="producto.php"><img src="img/cereza.jpg" class="media-object img-responsive" width="100%" height="60%"></a>
			</div>
			<div class="well"> Lubricante sabor chicle
				<a href="producto.php"><img src="img/chicle.jpg" class="media-object img-responsive" width="100%" height="60%"></a>
			</div>
			<div class="well"> Curso: Yoga sensible al trauma
				<a href="producto.php"><img src="img/yoga.jpg" class="media-object img-responsive" width="100%" height="60%"></a>
			</div>
		</div>
		<div class="col-sm-8 text-center">
			<div class="well" id="contenedor">
				<h2>La contraseña se ha cambiado exitosamente.</h2>
				<p> ¡Gracias por ser parte de nuestra familia! </p>
				<a href="index.php" class="btn btn-success" role="button">Regresar</a>
			</div>
		</div>
		<div class="col-sm-2 sidenav">
			<h4>Echa un vistazo</h4>
			<div class="well"> Lubricante sabor chocolate
				<a href="producto.php"><img src="img/chocolate.jpg" class="media-object img-responsive" width="100%" height="60%"></a>
			</div>
			<div class="well"> Lubricante sabor chicle
				<a href="producto.php"><img src="img/chicle.jpg" class="media-object img-responsive" width="100%" height="60%"></a>
			</div>
			<div class="well"> Lubricante sabor sandía
				<a href="producto.php"><img src="img/sandia.jpg" class="media-object img-responsive" width="100%" height="60%"></a>
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
