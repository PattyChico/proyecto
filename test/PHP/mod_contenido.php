<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Programacion en C++</title>
		<link rel="stylesheet" type="text/css" href="../CSS/normalize.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Index.css">
		<!--<link rel="stylesheet" type="text/css" href="../CSS/registro.css">-->
		<style type="text/css">
			figure.imagen 
			{
				width:250px;
				height: 250px;
			}
			figure.imagen img
			{
				width: 100%;
				height: 100%;
			}
		</style>
	</head>
	<body>

		<header>
			<p>Administrador</p>
		</header>
		
		<form action="Validacion/valida_mod_contenido.php" method="post" enctype="multipart/form-data">
			<?php
				$id_subtema= $_POST['modifica'];
				include('Conexion/conexion.php');
				//$sql="SELECT id_tema FROM contenido WHERE id_contenido='$id_subtema' "
				$sql="SELECT t.nombre, /*t.id_tema,*/ c.nom_subtema, c.parrafo, c.imagen FROM temas as t inner join contenido as c on t.id_tema=c.id_tema WHERE id_contenido='$id_subtema' ";//obtenemos el nombre del tema
				$datos=$conexion->query($sql);
				foreach($datos as $resultado)
				{
					$tema=$resultado['nombre'];
					//$id_tema=$resultado['id_tema'];
					$subtema=$resultado['nom_subtema'];
					$parrafo=$resultado['parrafo'];
					$imagen=$resultado['imagen'];
					
					echo "<div>";
					echo "<label>Tema:</label>";
					echo "<input type='text' name='tema' value='$tema' required>";
					echo "</div>";

					echo "<div id='imagen'>";
					echo "<figure class=imagen ><img src='../Imagenes/Contenido/$imagen'></figure>";
					echo "<label>Imagen:</label>";
					echo "<input id='imagen' type='file' name='imagen'>";
					echo "</div>";

					echo "<div>";
					echo "<label>Subtema:</label>";
					echo "<input type='text' name='subtema' value='$subtema' required>";
					echo "</div>";

					echo "<div>";
					echo "<label>Texto:</label>";
					echo "<textarea name='parrafo' rows= '8' required> $parrafo</textarea>";
					echo "</div>";
				}
				$conexion=null;

			?>
			<div id="color3" class="botones">
			    <button class="boton" type="submit" >Modificar</button>
			</div>
		</form>
	</body>
</html>