<?php

header("Content-type: text/xml");
include('../Conexion/conexion.php');

$sql="SELECT nombre, a_paterno, a_materno, correo, sexo, fecha_nacimiento, nick, password, fecha FROM usuario inner join login on usuario.id_usuario=login.id_usuario";
$datos= $conexion->query($sql);

$xml="<?xml version='1.0'?>";//variable que contiene el codigo xml
$xml .="<informacion>";

foreach($datos as $resultado)
{
	$nombre=$resultado['nombre'];
	$paterno=$resultado['a_paterno'];
	$materno=$resultado['a_materno'];
	$correo=$resultado['correo'];
	$sexo=$resultado['sexo'];
	$nacimiento=$resultado['fecha_nacimiento'];

	$nick=$resultado['nick'];
	$pass=$resultado['password'];
	$fecha=$resultado['fecha'];

	$xml .="<usuario>";
		$xml .="<nombre>".$nombre."</nombre>";
		$xml .="<paterno>".$paterno."</paterno>";
		$xml .="<materno>".$materno."</materno>";
		$xml .="<correo>".$correo."</correo>";
		$xml .="<sexo>".$sexo."</sexo>";
		$xml .="<nacimiento>".$nacimiento."</nacimiento>";
		$xml .="<nick>".$nick."</nick>";
		$xml .="<password>".$pass."</password>";
		$xml .="<fecha>".$fecha."</fecha>";
	$xml .="</usuario>";
}
$xml .="</informacion>";
echo $xml;

?>