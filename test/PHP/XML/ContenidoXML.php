<?php

header("Content-type: text/xml");
include('../Conexion/conexion.php');

$sql="SELECT nombre, fecha FROM temas";
$datos= $conexion->query($sql);

$xml="<?xml version='1.0'?>";//variable que contiene el codigo xml
$xml .="<informacion>";

foreach($datos as $resultado)
{
	$nombre=$resultado['nombre'];
	$fecha=$resultado['fecha'];

	$xml .="<tema>";
		$xml .="<nombre>".$nombre."</nombre>";
		$xml .="<fecha>".$fecha."</fecha>";
	$xml .="</tema>";
}
$xml .="</informacion>";
echo $xml;

?>