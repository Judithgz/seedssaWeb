<?php

function validaFecha($fecha){
	//aa-mm-dd
	$fecha_array = explode("-",$fecha);
	//mm, dd, aa
	return checkdate($fecha_array[1],$fecha_array[2],$fecha_array[0]);
}

function validaImagen($producto, $anchoNuevo){
	$archivo = "../img/".$producto;
	//print $archivo."<br>";
	
	//Datos de la imagen
	$info = getimagesize($archivo);
	$ancho = $info[0];
	$alto = $info[1];
	$tipo = $info["mime"];
	
	//Operacion para medidas de la imagen
	$nuevoAncho = $anchoNuevo;
	$factor = $anchoNuevo / $ancho;
	$nuevoAlto = $alto * $factor;
	
	//Creamos el objeto para la nueva imagen
	switch($tipo){
		case "image/jpg":
		case "image/jpeg":
			$imagen = imagecreatefromjpeg($archivo);
			break;
		case "image/png":
			$imagen = imagecreatefrompng($archivo);
			break;	
		case "image/gif":
			$imagen = imagecreatefromgif($archivo);
			break;
	}
	
	//Modificamos la imagen con las nuevas medidas
	$lienzo = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	
	//Reemplazamos datos originales con los nuevos
	imagecopyresampled($lienzo, $imagen, 0,0, 0,0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	
	//Creamos el nuevo archivo
	imagejpeg($lienzo, "../img/".$producto, 80);
}

//Ayuda a evitar posibles datos maliciosos
function escapaCadena($cadena){
	$cadena = escapeshellcmd($cadena);
	//print $cadena;
	$buscar  = array('^','delete', 'drop', 'truncate','exec','system');
	$reemplazar = array('-','de*le*te', 'dr*op', 'trun*cate','ex*ec','syst*em');
	$cadena = str_replace($buscar, $reemplazar, $cadena);
	//print $cadena;
	return $cadena;
}

function limpiaNombreArchivo($producto){
	$buscar  = array('á','é', 'í', 'ó','ú','Á','É','Í','Ó','Ú','Ñ','ñ','Ü','ü');
	$reemplazar = array('a','e', 'i', 'o','u','A','E','I','O','U','N','n','U','u');
	$cadena = str_replace($buscar, $reemplazar, $producto);
	print $cadena;
	return $cadena;
}

?>