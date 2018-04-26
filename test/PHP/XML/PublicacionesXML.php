<?php

header("Content-type: text/xml");
include('../Conexion/conexion.php');

$sql="SELECT nombre, a_paterno, a_materno, nick, f.publicacion, f.fecha FROM usuario inner join login on usuario.id_usuario=login.id_usuario inner join foro as f on usuario.id_usuario=f.id_usuario";
$datos= $conexion->query($sql);

$xml="<?xml version='1.0'?>";//variable que contiene el codigo xml
$xml .="<informacion>";

foreach($datos as $resultado)
{
	$nombre=$resultado['nombre'];
	$paterno=$resultado['a_paterno'];
	$materno=$resultado['a_materno'];
	$nick=$resultado['nick'];
	$publicacion=$resultado['publicacion'];
	$fecha=$resultado['fecha'];

	$xml .="<foro>";
		$xml .="<publicacion>".$publicacion."</publicacion>";
		$xml .="<fecha>".$fecha."</fecha>";
		$xml .="<nombre>".$nombre."</nombre>";
		$xml .="<paterno>".$paterno."</paterno>";
		$xml .="<materno>".$materno."</materno>";
		$xml .="<nick>".$nick."</nick>";
	$xml .="</foro>";
}
$xml .="</informacion>";
echo $xml;

?>