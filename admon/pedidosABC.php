<?php
//Iniciamos sesion como ADMIN
session_start();
if (!isset($_SESSION["admon"])) {
	header("location:index.php");
}
require "../php/conn.php";
require "../php/funciones.php";
require "../php/carritofunciones.php";

//Modo de la página
//S - consulta
//A - alta
//B - borrar
//C - cambiar
if (isset($_GET["m"])) {
	$m = $_GET["m"];
} else {
	$m = "S";
}

//Leer productos, funcion borrar
if ($m=="D") {
	$id = $_GET["id"];
	//Verificamos que el usuario no tenga registros en la tabla carrito
	$sql = "SELECT * FROM carrito WHERE num='".$id."'";
	$r = mysqli_query($conn, $sql);
	//Trasladamos los registros a la tabla histórica
	while($data = mysqli_fetch_assoc($r)){
		$sql = "INSERT INTO historialpedidos ";
		$sql .= "SET num='".$data["num"]."', ";
		$sql .= "estado='".$data["estado"]."', ";
		$sql .= "idProducto=".$data["idProducto"].", ";
		$sql .= "precio=".$data["precio"].", ";
		$sql .= "descuento=".$data["descuento"].", ";
		$sql .= "envio=".$data["envio"].", ";
		$sql .= "cantidad=".$data["cantidad"];
		if (!mysqli_query($conn, $sql)) {
			print "Error al insertar el producto";
		}
	}
	//Borramos el registro
	$sql = "DELETE FROM carrito WHERE num='".$id."'";
	if(mysqli_query($conn, $sql)){
		header("location:pedidosABC.php");
	}
}

$errores = array();



//lee la tabla productos
if ($m=="S") {
	$sql = "SELECT num, estado, sum(precio) as importe, sum(cantidad) as cantidad, sum(descuento) as descuento, sum(envio) as envio, idUsuario, fecha FROM carrito GROUP BY num ORDER BY fecha";
	$r = mysqli_query($conn, $sql);
	$pedidos = array();
	while($data = mysqli_fetch_assoc($r)){
		array_push($pedidos, $data);
	}
}



//Verificar datos de producto antes de que se elimine
if ($m=="B") {

	//Identificador del carrito
	$carrito = $_GET["id"];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>ABC Pedidos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
			<a href="index.php" class="navbar-brand">SEEDSSA Admin</a>
		</div>
		<div class="collapse navbar-collapse" id="menu">
			<ul class="nav navbar-nav">
				<li><a href="productosABC.php">Productos</a></li>
				<li><a href="diversionABC.php">Diversión</a></li>
				<li><a href="usuariosABC.php">Usuarios</a></li>
				<li  class="active"><a href="pedidosABC.php">Pedidos</a></li>
				<li><a href="cambiaClaveAdmin.php">Cambiar accesos</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php require "php/navbar.php"; ?>
			</ul>
		</div>
	</div>
</nav>

<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-2 sidenav">
			</div>
			<div class="col-sm-8 text-left">
				<div class="well" id="contenedor">
				<h2 class="text-center">ABC tabla pedidos</h2>
				<?php
				if(count($errores)>0){
					print '<div class="alert alert-danger">';
					foreach ($errores as $key => $valor) {
						print "<strong>* ".$valor."</strong>";
					}
					print '</div>';
				}
				//Se muestra el pedido antes de ser eliminado
				if($m=="B"){
					print '<div class="alert alert-danger">';
					print "¿Desea borrar este pedido?";
					print "<a href='pedidosABC.php'>No</a>&nbsp;";
					print "<a href='pedidosABC.php?m=D&id=".$carrito."'>Si</a>";
					print "<p>Los datos del pedido se mostrarán en el historial.</p>";
					print "</div>";
					carritoConsulta($carrito, $conn);

				}
				

				if ($m=="S") {
					print "<table class='table table-striped' width='100%'>";
					print "<tr>";
					print "<th>Estado</th>";
					print "<th>Importe</th>";
					print "<th>Cantidad prod.</th>";
					print "<th>Descuento</th>";
					print "<th>Envío</th>";
					print "<th>Total</th>";
					print "<th>Cliente</th>";
					print "<th>Fecha</th>";
					print "<th>Borrar</th>";
					print "</tr>";
					for ($i=0; $i < count($pedidos) ; $i++) {
						$total = $pedidos[$i]["importe"]-$pedidos[$i]["descuento"]+$pedidos[$i]["envio"];
						if($pedidos[$i]["estado"]=="0"){
							print "<tr class='warning'>";
							print "<td>";
							print "Abierto";
						}
						if($pedidos[$i]["estado"]=="1"){
							print "<tr class='success'>";
							print "<td>";
							print "Aprobado";
						}
						print "</td>";
						print "<td>".number_format($pedidos[$i]["importe"],2)."</td>";
						print "<td>".number_format($pedidos[$i]["cantidad"])."</td>";
						print "<td>".number_format($pedidos[$i]["descuento"],2)."</td>";
						print "<td>".number_format($pedidos[$i]["envio"],2)."</td>";
						print "<td>".number_format($total,2)."</td>";
						print "<td>".$pedidos[$i]["idUsuario"]."</td>";
						print "<td>".$pedidos[$i]["fecha"]."</td>";
						print "<td><a class='btn btn-danger' href='pedidosABC.php?m=B&id=".$pedidos[$i]["num"]."'>Borrar</a></td>";
						print "</tr>";
					}
					print "</table>";
				}
				?>
			</div>
		</div>
		<div class="col-sm-2 sidenav">
		
		</div>
	</div>
</div>

<footer class="container-fluid text-center">
<a>SEEDSSA 2023</a>
</footer>
</body>
</html>