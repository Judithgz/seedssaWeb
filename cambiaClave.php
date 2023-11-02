<?php
require "php/conn.php";
require "php/sesion.php";


//Verificar si se envia la informacion
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	//Leemos los datos de usuario
	$sql = "SELECT * FROM usuarios WHERE id=".$id;
	$r = mysqli_query($conn, $sql);
	$n = mysqli_num_rows($r);
	if($n!=1){
		//Si no existe el usuario
		header("location:index.php");
	}
}

if (isset($_POST["id"])) {
	$id = $_POST["id"];
	$clave1 = $_POST["clave1"];
	$clave2 = $_POST["clave2"];
	//Verificar contraseñas
	if ($clave1==$clave2) {
		$clave = hash_hmac("sha512", $clave1, "tumblrss");
		$sql = "UPDATE usuarios SET clave='".$clave."' WHERE id=".$id;
		if (mysqli_query($conn, $sql)) {
			header("location:cambiaClaveGracias.php");
		} else {
			$erro = "Error al actualizar la contraseña.";
		}
	} else {
		$error = "Las contraseñas no coinciden.";
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Cambiar contraseña </title>
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
		<div class="col-sm-8 text-left">
			<div class="well" id="contenedor">
				<?php
					if(isset($error)){
						print '<div class="alert alert-danger">';
						print "<strong>* ".$error."</strong>";
						print '</div>';
					}
				?>
				<h2 class="text-center">Cambiar contraseña</h2>
				<form action="cambiaClave.php" method="post">

					<div class="form-group text-left">
						<label for="clave1">Contraseña: </label>
						<input type="password" name="clave1" id="clave1" class="form-control" required placeholder="Escriba su contraseña"/>
					</div>

					<div class="form-group text-left">
						<label for="clave2">Repetir contraseña: </label>
						<input type="password" name="clave2" id="clave2" class="form-control" required placeholder="Confirme su contraseña"/>
					</div>

					<div class="form-group text-left">
						<label for="enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
					</div>


					<input type="hidden" name="id" id="id" value="<?php print $id; ?>">

				</form>
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
