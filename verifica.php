<?php
require "php/sesion.php";
require "php/conn.php";
require "php/carritofunciones.php";



if(!isset($_SESSION["usuario"])){
	header("location:login.php");
	exit;
}

if(isset($_POST["pago"])){
	$pago = $_POST["pago"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Revisa tu compra </title>
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
			<div id="contacto1">
				<h4></h4>
			</div>
		</div>

		<div class="col-sm-8 text-left">
			<div class="well">
				<ol class="breadcrumb">
					<li><a href="checkout.php">Iniciar sesión</a></li>
					<li><a href="direccion.php">Datos de envío</a></li>
					<li><a href="pago.php">Forma de pago</a></li>
					<li class="active">Revisar</li>
				</ol>
				<h2>Valide sus datos</h2>
				<p>Modo de pago: <?php print $pago; ?></p>
				<p>Nombre: <?php print $_SESSION["usuario"]["nombre"]." ".$_SESSION["usuario"]["apellidoPaterno"]." ".$_SESSION["usuario"]["apellidoMaterno"]; ?></p>
				<p>Dirección:<?php print $_SESSION["usuario"]["direccion"].", Col. ".$_SESSION["usuario"]["colonia"].", estado ".$_SESSION["usuario"]["estado"].", ciudad ".$_SESSION["usuario"]["ciudad"].", ".$_SESSION["usuario"]["pais"]; ?></p>
				<p>Código postal: <?php print $_SESSION["usuario"]["codpos"]; ?></p>
				<br><br>
				<?php despliegaCarritoCompleto($carrito, true, $conn); ?>
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
