<?php
require "php/sesion.php";
require "php/conn.php";

//Verificamos si el usuario esta logeado o no
if (!isset($_SESSION["usuario"])) {
	header("location:login.php");
	exit;
}


//Si el usuario cambia su informacion, utilizamos metodo de actualizacion
if(isset($_POST["nombre"])){
	//Recuperamos el identificador
	$id = $_SESSION["usuario"]["id"];
	//Recuperamos la información del usuario
	$nombre = $_POST["nombre"];
	$apellidoPaterno = $_POST["apellidoPaterno"];
	$apellidoMaterno = $_POST["apellidoMaterno"];
	$correo = $_POST["correo"];
	$direccion = $_POST["direccion"];
	$ciudad = $_POST["colonia"];
	$colonia = $_POST["ciudad"];
	$estado = $_POST["estado"];
	$codpos = $_POST["codpos"];
	$pais = $_POST["pais"];
	//Actualizamos la informacion del usuario
	$sql = "UPDATE usuarios SET ";
	$sql .= "nombre='".$nombre."', ";
	$sql .= "apellidoPaterno='".$apellidoPaterno."', ";
	$sql .= "apellidoMaterno='".$apellidoMaterno."', ";
	$sql .= "email='".$correo."', ";
	$sql .= "direccion='".$direccion."', ";
	$sql .= "colonia='".$colonia."', ";
	$sql .= "ciudad='".$ciudad."', ";
	$sql .= "estado='".$estado."', ";
	$sql .= "codpos='".$codpos."', ";
	$sql .= "pais='".$pais."' ";
	$sql .= "WHERE id=".$id;
	//Ejecutamos el sql
	if(mysqli_query($conn, $sql)){
		//Leemos el registro del usuario
		$sql = "SELECT * FROM usuarios WHERE id=".$id;
		$r = mysqli_query($conn, $sql);
		//pasamos los datos a un objeto
		$usuario = mysqli_fetch_assoc($r);
		//Actualizamos la variable de sesion
		$_SESSION["usuario"]=$usuario;
		//Saltamos a la página de pago
		header("location:pago.php");
		exit;
	}

}


//Variables para usar en impresion de  informacion de usuario
$nombre = $_SESSION["usuario"]["nombre"];
$apellidoPaterno = $_SESSION["usuario"]["apellidoPaterno"];
$apellidoMaterno = $_SESSION["usuario"]["apellidoMaterno"];
$correo = $_SESSION["usuario"]["email"];
$direccion = $_SESSION["usuario"]["direccion"];
$colonia = $_SESSION["usuario"]["colonia"];
$ciudad = $_SESSION["usuario"]["ciudad"];
$estado = $_SESSION["usuario"]["estado"];
$codpos = $_SESSION["usuario"]["codpos"];
$pais = $_SESSION["usuario"]["pais"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Envío </title>
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
					<li class="active">Datos de envío</li>
					<li>Forma de pago</li>
					<li>Revisar</li>
				</ol>
				<h2 class="text-center">Datos de envío</h2>
				<p>Verfique los siguientes datos para su envío: </p>
				<form action="direccion.php" method="post">
					<div class="form-group text-left">
						<label for="nombre">Nombre: </label>
						<input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Escriba su nombre" value="<?php print $nombre; ?>" />
					</div>

					<div class="form-group text-left">
						<label for="apellidoPaterno">Apellido Paterno: </label>
						<input type="text" name="apellidoPaterno" id="nombre" class="form-control" required placeholder="Escriba su apellido paterno" value="<?php print $apellidoPaterno; ?>" />
					</div>

					<div class="form-group text-left">
						<label for="apellidoMaterno">Apellido Materno: </label>
						<input type="text" name="apellidoMaterno" id="nombre" class="form-control" required placeholder="Escriba su apellido materno" value="<?php print $apellidoMaterno; ?>" />
					</div>

					<div class="form-group text-left">
						<label for="correo">Correo electrónico: </label>
						<input type="email" name="correo" id="nombre" class="form-control" required placeholder="Escriba su correo electrónico" value="<?php print $correo; ?>" />
					</div>

					<div class="form-group text-left">
						<label for="direccion">Dirección: </label>
						<input type="text" name="direccion" id="direccion" class="form-control" required placeholder="Escriba su dirección" value="<?php print $direccion; ?>" />
					</div>

					<div class="form-group text-left">
						<label for="colonia">Colonia: </label>
						<input type="text" name="colonia" id="colonia" class="form-control" required placeholder="Escriba su colonia" value="<?php print $colonia; ?>" />
					</div>

					<div class="form-group text-left">
						<label for="ciudad">Ciudad: </label>
						<input type="text" name="ciudad" id="ciudad" class="form-control" required placeholder="Escriba su ciudad" value="<?php print $ciudad; ?>" />
					</div>
					<div class="form-group text-left">
						<label for="estado">Estado: </label>
						<input type="text" name="estado" id="estado" class="form-control" required placeholder="Escriba su estado" value="<?php print $estado; ?>" />
					</div>

					<div class="form-group text-left">
						<label for="codpos">Código Postal: </label>
						<input type="text" name="codpos" id="codpos" class="form-control" required placeholder="Escriba su código postal" value="<?php print $codpos; ?>" />
					</div>

					<div class="form-group text-left">
						<label for="pais">País: </label>
						<input type="text" name="pais" id="pais" class="form-control" required placeholder="Escriba su pais" value="<?php print $pais; ?>" />
					</div>


					<div class="form-group text-left">
						<label for="enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
					</div>
				</form>
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
