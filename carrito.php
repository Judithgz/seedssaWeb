<?php
require "php/sesion.php";
require "php/conn.php";
require "php/carritofunciones.php";


//la m nos indica que se va a borrar
if (isset($_GET["m"])) {
	//Recuperamos el identificador
	$id = $_GET["id"];
	//Delete
	$sql = "DELETE FROM carrito WHERE idProducto=".$id." AND num='".$carrito."'";
	if(!mysqli_query($conn, $sql)) print "Error al borrar el registro";
} else if (isset($_GET["id"])) {
	//El usuario nos envía un producto
	//Recuperamos los datos de los productos
	$id = $_GET["id"];
	$sql = "SELECT * FROM productos WHERE id=".$id;
	$r = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($r);
	//Si existe ya el carrito, lo recuperamos
	if(isset($_SESSION['carrito'])){
		$carrito = $_SESSION['carrito'];
	} else {
		//Si no existe el carrito, lo creamos
		//y lo almacenamos en una variable de sesión
		$carrito = llaveCarrito(30);
		$_SESSION['carrito']=$carrito;
	}
	//print $carrito;
	//Agregamos el producto en el carrito
	agregaProducto($carrito,$id, $data["precio"], $data["descuento"], $data["envio"],$conn);
}
if(isset($_POST["num"])){
	$num = $_POST["num"];
	for ($i=0; $i < $num; $i++) { 
		$producto = $_POST["i".$i];
		$cantidad = $_POST["c".$i];
		actualizaProducto($carrito, $producto, $cantidad, $conn);
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Carrito de compras </title>
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
		<div class="col-sm-8 text-left" >
			<div class="well">
				<ol class="breadcrumb" >
					<li><a href="index.php">Inicio</a></li>
					<li class="active">Carrito</li>
				</ol>
				<?php despliegaCarritoCompleto($carrito, false, $conn); ?>
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
