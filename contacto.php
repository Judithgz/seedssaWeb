<?php
require "php/sesion.php";
require "php/conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Contacto </title>
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
			

		</div>
		<div class="col-sm-8 text-left">
			<div class="well" id="contenedor">
				<h2 class="text-center">Contacto</h2>
				<p>Por favor ingrese sus datos: </p>
				<form action="contactoGracias.php">
					<div class="form-group text-left">
						<label for="nombre">Nombre: </label>
						<input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Escriba su nombre"/>
					</div>

					<div class="form-group text-left">
						<label for="apellidoPaterno">Apellido Paterno: </label>
						<input type="text" name="apellidoPaterno" id="nombre" class="form-control" required placeholder="Escriba su apellido paterno"/>
					</div>

					<div class="form-group text-left">
						<label for="apellidoMaterno">Apellido Materno: </label>
						<input type="text" name="apellidoMaterno" id="nombre" class="form-control" required placeholder="Escriba su apellido materno"/>
					</div>

					<div class="form-group text-left">
						<label for="correo">Correo electrónico: </label>
						<input type="email" name="correo" id="nombre" class="form-control" required placeholder="Escriba su correo electrónico"/>
					</div>

					<div class="form-group text-left">
						<label for="observaciones">Observaciones: </label>
						<textarea class="form-control" name="observaciones" id="observaciones"></textarea>
					</div>

					<div class="form-group text-left">
						<label for="enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-2 sidenav">
			

		</div>
	</div>
</div>
<br>



<footer class="container-fluid text-center">
	<a href="aviso.php">Aviso de privacidad.</a>
</footer>

</body>
</html>
