<?php
use PHPUnit\Framework\TestCase;
//require 'loginFunciones.php';
require 'C:\xampp\htdocs\SEEDSSAWEB\php\loginFunciones.php'; // Reemplaza con la ruta correcta
require 'C:\xampp\htdocs\SEEDSSAWEB\php\funciones.php';
require 'C:\xampp\htdocs\SEEDSSAWEB\php\carritofunciones.php';


class carritoTest extends \PHPUnit\Framework\TestCase
{
    public function testLoginWithCorrectCredentials()
    {
        // Simula una solicitud POST con credenciales válidas
        $_POST["email"] = "al02943484@tecmilenio.mx";
        $_POST["clave"] = "12345678";
        $_POST["recordarme"] = "on";

        // Llama a la función de inicio de sesión
        ob_start();
        require 'C:\xampp\htdocs\SEEDSSAWEB\login.php'; // Reemplaza con la ruta correcta
        ob_end_clean();

        // Verifica que el usuario haya iniciado sesión correctamente
        $this->assertArrayHasKey('usuario', $_SESSION);
    }


    public function testValidarFecha(){
        $fecha = "23-05-11";
        $fechaValidada = validaFecha($fecha);
        $fecha_array = explode("-",$fecha);
        $fechaEsperada = checkdate($fecha_array[1],$fecha_array[2],$fecha_array[0]);
        $this->assertEquals($fechaEsperada, $fechaValidada);
    }


    public function testEscapaCadena(){
        $string = "delete";
        $cadenaEsperada = escapaCadena($string);
        $this->assertEquals("de*le*te", $cadenaEsperada);
    }


    public function testLimpiarNombreArchivo(){
        $string = "máríá";
        $cadenaEsperada = limpiaNombreArchivo($string);
        $this->assertEquals("maria", $cadenaEsperada);
    }


    public function testLlaveCarrito(){
        $llave = llaveCarrito(30);
        $this->assertIsString($llave);
    }



}
