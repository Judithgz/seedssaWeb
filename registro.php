<?php

	require "php/conn.php";
	require "php/sesion.php";

	$errores = array();
	//Verificamos que se envie la informacion
	if (isset($_POST["nombre"])) {
		$nombre = $_POST["nombre"];
		$apellidoPaterno = $_POST["apellidoPaterno"];
		$apellidoMaterno = $_POST["apellidoMaterno"];
		$email = $_POST["correo"];
		$direccion = $_POST["direccion"];
		$colonia = $_POST["colonia"];
		$ciudad = $_POST["ciudad"];
		$estado = $_POST["estado"];
		$codpos = $_POST["codpos"];
		$pais = $_POST["pais"];
		$clave1 = $_POST["clave1"];
		$clave2 = $_POST["clave2"];
		

		if ($nombre == "") {     //Validacion de informacion en registro
			$errores[0] = "El nombre del usuario es requerido";
		} else if ($apellidoPaterno == ""){
			$errores[1] = "El apellido paterno del usuario es requerido";
		} else if ($email == ""){
			$errores[2] = "El correo electrónico del usuario es requerido";
		} else if ($direccion == ""){
			$errores[3] = "La dirección del usuario es requerido";
		} else if ($colonia == ""){
			$errores[4] = "La colonia del usuario es requerido";
		} else if ($estado == ""){
			$errores[5] = "El estado del usuario es requerido";
		} else if ($codpos == ""){
			$errores[6] = "El código postal del usuario es requerido";
		} else if ($pais == ""){
			$errores[7] = "El país del usuario es requerido";
		} else if ($clave1 !== $clave2){
			$errores[10] = "Las contraseñas no coinciden.";
		}  else {
			if(validarCorreo($email, $conn)){
			//Encriptacion
			$clave = hash_hmac("sha512",$clave1, "tumblrss");
			$sql = "INSERT INTO usuarios VALUES(0,";
			$sql .= "'".$nombre."', '".$apellidoPaterno."',";
			$sql .= "'".$apellidoMaterno."', '".$email."',";
			$sql .= "'".$direccion."', '".$colonia."',";
			$sql .= "'".$ciudad."', '".$estado."',";
			$sql .= "'".$codpos."', '".$pais."', '".$clave."')";
			//
			if(mysqli_query($conn, $sql)) { 
				header("location:registroGracias.php");
			} else {
				$errores[9] = "Error en la insercion a base de datos.";
			} 
		} else {
			$errores[8] = "Ya existe el correo electrónico en la base de datos";
		}
	}
} 

//Validamos si el correo electronico ya existe o no en la base de datos para el registro y evitar usuarios duplicados.
function validarCorreo($email, $conn){
	$sql = "SELECT * FROM usuarios WHERE email='".$email."'";
	$r = mysqli_query($conn, $sql);
	$n = mysqli_num_rows($r);
	$res = ($n==0)? true : false; 
	return $res;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Registro </title>
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
			<div class="well" id="contenedor">
				<?php
					if(is_countable($errores) && count($errores) > 0){
						print '<div class="alert alert-danger">';
						foreach ($errores as $key => $valor) {
							print "<strong>* ".$valor."</strong>";
						}
						print '</div>';
					}
				?>
				<h2 class="text-center">Registro</h2>
				<p>Por favor ingrese sus datos: </p>
				<form action="registro.php" method="post">
					<div class="form-group text-left">
						<label for="nombre"> Nombre: </label>
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
						<label for="clave1">Contraseña: </label>
						<input type="password" name="clave1" id="clave1" class="form-control" required placeholder="Escriba su contraseña"/>
					</div>

					<div class="form-group text-left">
						<label for="clave2">Repetir contraseña: </label>
						<input type="password" name="clave2" id="clave2" class="form-control" required placeholder="Confirme su contraseña"/>
					</div>

					<div class="form-group text-left">
						<label for="direccion">Dirección: </label>
						<input type="text" name="direccion" id="direccion" class="form-control" required placeholder="Escriba su dirección"/>
					</div>

					<div class="form-group text-left">
						<label for="colonia">Colonia: </label>
						<input type="text" name="colonia" id="colonia" class="form-control" required placeholder="Escriba su colonia"/>
					</div>

					<div class="form-group text-left">
						<label for="ciudad">Ciudad: </label>
						<input type="text" name="ciudad" id="ciudad" class="form-control" required placeholder="Escriba su ciudad"/>
					</div>
					<div class="form-group text-left">
						<label for="estado">Estado: </label>
						<input type="text" name="estado" id="estado" class="form-control" required placeholder="Escriba su estado"/>
					</div>

					<div class="form-group text-left">
						<label for="codpos">Código Postal: </label>
						<input type="text" name="codpos" id="codpos" class="form-control" required placeholder="Escriba su código postal"/>
					</div>

					<div class="form-group text-left">
						<label for="pais">País: </label>
						<input type="text" name="pais" id="pais" class="form-control" required placeholder="Escriba su pais"/>
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
