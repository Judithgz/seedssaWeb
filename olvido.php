<?php
require "php/conn.php";
require "php/sesion.php";

//Por ahora se evita utilizar este doc ya que no se ha configurado lo que es SMPT para configurar correo y contraseña de donde se mandan



if (isset($_POST["email"])) {
	$email = $_POST["email"];
	//Buscamos correo en la base de datos
	$sql = "SELECT * FROM usuarios WHERE email='".$email."'";
	$r = mysqli_query($conn, $sql);
	$n = mysqli_num_rows($r);
	if($n==1){
		$data = mysqli_fetch_assoc($r);
		$id = $data["id"];

		$mensaje = "Entra a la siguiente liga para cambiar tu contraseña.<br>";
		$mensaje .= "<a href='localhost/seedssaWeb/cambiaclave.php?id=".$id.">Cambia contraseña</a>";

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type:text/html; charset=UTF-8\r\n";
		$headers .= "From: seedssaWeb\r\n";
		$headers .= "Repaly-to: $email\r\n";

		$asunto = "Cambiar contraseña.";

		if(mail($email, $asunto, $mensaje, $headers)){
			header("location:olvidoGracias.php");
		} else {
			print "Error al enviar correo, intente más tarde.<br>";
		}

	} else {
		$error = "El correo no existe en la base de datos";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Olvido contraseña </title>
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
				<?php
					if(isset($error)){
						print '<div class="alert alert-danger">';
						print "<strong>* ".$error."</strong>";
						print '</div>';
					}
				?>
				<h2 align="center">¿Olvidó su contraseña?</h2> <br>
				<form action="olvido.php" method="post">
					<div class="form-group">
						<label for="email">Correo electrónico: </label>
						<input type="email" name="email" id="email" class="form-control" required placeholder="seedssa@ejemplo.com">
					</div>


					<div class="form-group">
						<label for="enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button">
					</div>
				</form>

				<br>

				<a href="registro.php" class="btn btn-info">Registrate</a>
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
