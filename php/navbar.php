<?php


//Verificamos si la sesion del carrito esta activa y logo
if (isset($_SESSION["carrito"])) {
	print '<li><a href="carrito.php"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Carrito</a></li>';
}

//Valida si la sesion esta activa
if(isset($_SESSION['usuario'])){
	print '<li><a href="#">'.$nombre." ".$apellidoPaterno." ".$apellidoMaterno.' </a></li>';
	print '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Salir</a></li>';
} else {
	print '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Iniciar Sesión</a>';
	}
?>