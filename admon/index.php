<?php
require "../php/conn.php";


if(isset($_POST["usuario"])){
	$usuario = $_POST["usuario"];
	$clave = $_POST["clave"];
	$clave = substr(hash_hmac("sha512", $clave, "tumblrss"),0,100);
	//Creamos el query
	$sql = "SELECT * FROM admon WHERE usuario='".$usuario."' AND clave='".$clave."'";
	$r = mysqli_query($conn, $sql);
	$n = mysqli_num_rows($r);
	if($n==1){
		//Iniciar la sesion
		session_start();
		//Creamos la variable de sesion
		$_SESSION['admon']=$usuario;
		//Saltamos a index
		header("location:productosABC.php");
	} else {
		$error = "Usuario o clave de acceso errónea";
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Iniciar Sesión | Admin </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/main.css">

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
				<h2 align="center">Iniciar sesión | Admin </h2> <br>
				<form action="index.php" method="post">
					<div class="form-group">
						<label for="usuario">Usuario: </label>
						<input type="text" name="usuario" id="usuario" class="form-control" required placeholder="Escribe tu usuario">
					</div>

					<div class="form-group">
						<label for="clave">Contraseña: </label>
						<input type="password" name="clave" id="clave" class="form-control" required placeholder="Escribe tu contraseña">
					</div>


					<div class="form-group">
						<label for="entrar"></label>
						<input type="submit" name="entrar" value="Entrar" class="btn btn-success" role="button">
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
	<a>SEEDSSA 2023.</a>
</footer>

</body>
</html>
