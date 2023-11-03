<?php
//Iniciamos sesion
session_start();

//Validacion: Si existe la variable usuario (variables de sesion)
if (isset($_SESSION['usuario'])) {
	$nombre = $_SESSION['usuario']['nombre'];
	$apellidoPaterno = $_SESSION['usuario']['apellidoPaterno'];
	$apellidoMaterno = $_SESSION['usuario']['apellidoMaterno'];
}

?>