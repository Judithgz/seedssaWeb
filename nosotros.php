<?php
require "php/sesion.php";
require "php/conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Sobre nosotros </title>
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
				<li class="active"><a href="nosotros.php">Nosotros</a></li>
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


<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-2 sidenav">
			
			<div id="contacto1">
				<h4></h4>
			</div>

		</div>
		<div class="col-sm-8 text-left">
			<div class="well" id="contenedor">
			<h1 class="text-center">¿Quiénes somos?</h1> <br>
			<div class="media-object-center" align="center">
			<img src="img/logoWhite.png" width="30%" class="media-object" alt="Logo SEEDSSA">
			</div>
			<h4 id="us"> SEEDSSA es una asociación civil fundada en el año 2001. <br>
			Educamos y acompañamos a adolescentes y jóvenes, ofreciendo servicios amigables de salud sexual y salud reproductiva junto con información completa, científica y laica, con un enfoque en derechos humanos, para que puedan cumplir su plan de vida a través del ejercicio de sus derechos sexuales y derechos reproductivos.
			<br><br>
			A partir del año 2020 SEEDSSA ha empezado a ofrecer también servicios de salud mental junto con nuestros expertos en psicología y psicoterapia.
			<br><br>
			Buscamos seguir creciendo nuestra familia año con año para llegar a más adolescentes y jóvenes.
			</h4>
			<div class="media-object-center" align="center">
			<img src="img/favicon.png" width="20%" class="media-object" alt="Logo SEEDSSA">
			</div>
			

			</div>
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
