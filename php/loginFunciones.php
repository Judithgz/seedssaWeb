<?php 

if(isset($_POST["email"])) {
	$email = $_POST["email"];
	$clave = $_POST["clave"];
	$clave2 = hash_hmac("sha512", $clave, "tumblrss");
	$recordarme = $_POST["recordarme"];

	//Recuerdame checkbox, recopilamos informacion 
	$nombre = "datos";
	$valor = $email."|".$clave;
	if($recordarme=="on"){
		$fecha = time() + (60*60*24*7);
	} else {
		$fecha = time() - 1;
	}
	setcookie($nombre, $valor, $fecha);

	//Query
	$sql = "SELECT * FROM usuarios WHERE email='".$email."' AND clave='".$clave2."'";
	$r = mysqli_query($conn, $sql);
	$n = mysqli_num_rows($r);
	//Verificamos que usuario y contraseña sean correctos.
	if ($n==1) {
		//Guardamos datos en un objeto
		$usuario = mysqli_fetch_assoc($r);
		//Iniciamos la sesion
		session_start();
		//Variable de sesion
		$_SESSION['usuario']=$usuario;
		header("location:".$cambiaPagina);
	} else {
		$error = "Contraseña o correo electrónico incorrectos.";
	}
}

//Si la cookie existe entonces tomara los datos
$datos = isset($_COOKIE["datos"]) ? $_COOKIE["datos"] : null;
//Si no existe se quedaran en blanco
$email = "";
$clave = "";
$recordarme = "";
if (isset($datos)) {
	$aDatos = explode("|", $datos);
	$email = $aDatos[0];
	$clave = $aDatos[1];
	$recordarme = "checked";
}

?>