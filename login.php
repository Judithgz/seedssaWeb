<?php
require "php/conn.php";
$cambiaPagina = "index.php";
require "php/loginFunciones.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Iniciar Sesión </title>
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
					if(isset($error)){
						print '<div class="alert alert-danger">';
						print "<strong>* ".$error."</strong>";
						print '</div>';
					}
				?>
				<h2 align="center">Iniciar sesión</h2> <br>
				<form action="login.php" method="post">
					<div class="form-group">
						<label for="email">Correo electrónico: </label>
						<input type="email" name="email" id="email" class="form-control" required placeholder="seedssa@ejemplo.com" value="<?php print $email; ?>">
					</div>

					<div class="form-group">
						<label for="clave">Contraseña: </label>
						<input type="password" name="clave" id="clave" class="form-control" required placeholder="Escribe tu contraseña" value="<?php print $clave; ?>">
					</div>

					<div class="checkbox">
						<label><input type="checkbox" id="recordarme" name="recordarme" <?php print $recordarme; ?>>Recordarme</label>
					</div>

					<div class="form-group">
						<input type="submit" name="entrar" value="Entrar" class="btn btn-success" role="button">
					</div>
				</form>

				<!--<a href="olvido.php" class="btn btn-info">¿Olvidaste tu contraseña?</a> -->
				
				<a href="registro.php" class="btn btn-info">Registrate</a>
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
