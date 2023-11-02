<?php


//Valida si la sesion esta activa
if(isset($_SESSION['admon'])){
	print '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Salir</a></li>';
} else {
	header("location:index.php");
	}
?>