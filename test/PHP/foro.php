<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Programacion en c++</title>
		<link rel="stylesheet" type="text/css" href="../CSS/normalize.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Index.css">
		<link rel="stylesheet" type="text/css" href="../CSS/usuarios.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Foro.css">
	</head>
	<body>

		<header>
			<p>Registro</p>
		</header>
		<br><br><br><br><br>
		<!--<div class="foro">-->
		<div class="pubYcom">
			<?php
				include('Conexion/conexion.php');
				$sql="SELECT u.imagen, u.nombre, u.a_paterno, f.fecha, f.publicacion, f.id_publicacion FROM usuario as u inner join foro as f on u.id_usuario=f.id_usuario ORDER BY fecha desc";
				$publicaciones=$conexion->query($sql);
				foreach($publicaciones as $resultado)
				{
					$imagen= $resultado['imagen'];
					$nombre= $resultado['nombre'];
					$paterno= $resultado['a_paterno'];
					$fecha= $resultado['fecha'];
					$publicacion=$resultado['publicacion'];
					$id_publicacion= $resultado['id_publicacion'];

					//Foro
					//echo "<div class='pubYcom' ";
						echo "<div class='publicacion'>";
							echo "<figure class='userForo'> <img src='../Imagenes/Usuarios/$imagen'> </figure>";
							echo "<p class='nombreUser'>$nombre $paterno</p>";
							echo "<p class='fecha'>$fecha</p>";
							echo "<p class='publicacion'>$publicacion</p>";

							//echo "<p class='ComentarForo' onClick='displayResponder()'>Comentar</p>";///

							$sql="SELECT count(id_comentario) as totalCom FROM comentarios WHERE id_publicacion='$id_publicacion' ";
							$datos=$conexion->query($sql);
							$totalCom;
							foreach($datos as $resultado)
								$totalCom=$resultado['totalCom'];
							echo "<p class='verCom'>Comentarios(",$totalCom,")</p>";

							//////////////////////////////COMENTARIO/////////////////////////////////////////////
							$sql="SELECT u.imagen, u.nombre, u.a_paterno, c.fecha, c.comentario FROM usuario as u inner join comentarios as c on u.id_usuario=c.id_usuario WHERE c.id_publicacion='$id_publicacion' ORDER BY fecha desc"; 
							$comentarios=$conexion->query($sql);
							echo "<div class='comentarios'>";
							foreach($comentarios as $respuestas)
							{
								$imagen= $respuestas['imagen'];
								$nombre= $respuestas['nombre'];
								$paterno= $respuestas['a_paterno'];
								$fecha= $respuestas['fecha'];
								$comentario=$respuestas['comentario'];

								//echo "<div class='comentarios'>";
									echo "<figure class='userForo'> <img src='../Imagenes/Usuarios/$imagen'> </figure>";
									echo "<p class='nombreUser'>$nombre $paterno</p>";
									echo "<p class='fecha'>$fecha</p>";
									echo "<p class='comentario'>$comentario</p>";
								//echo "</div>";
							}
							echo "</div>";
							///////////////////////////////////////////////////////////////////////////////////////


							echo "<div id='comentar'>";
								echo "<form action='Validacion/valida_foro_com.php' method='post' enctype='multipart/form-data'>";
									echo "<div>";
										echo "<label>Comentario:</label>";
										echo "<textarea rows='4' name='comentario'></textarea>";
										echo "<input style='display:none' type='text' value='$id_publicacion' name='id_publicacion'>";
									echo "</div>";

									echo"<div id='color1' class='botones'>";
									    echo "<button class='boton' type='submit' >Comentar</button>";
									echo "</div>";
								echo "</form>";
							echo "</div>";

						echo "</div>";

					/*	$sql="SELECT u.imagen, u.nombre, u.a_paterno, c.fecha, c.comentario FROM usuario as u inner join comentarios as c on u.id_usuario=c.id_usuario WHERE c.id_publicacion='$id_publicacion' ORDER BY fecha desc"; 
						$comentarios=$conexion->query($sql);

						foreach($comentarios as $respuestas)
						{
							$imagen= $respuestas['imagen'];
							$nombre= $respuestas['nombre'];
							$paterno= $respuestas['a_paterno'];
							$fecha= $respuestas['fecha'];
							$comentario=$respuestas['comentario'];

							echo "<div class='comentarios'>";
								echo "<figure class='userForo'> <img src='../Imagenes/Usuarios/$imagen'> </figure>";
								echo "<p class='nombreUser'>$nombre $paterno</p>";
								echo "<p class='fecha'>$fecha</p>";
								echo "<p class='comentario'>$comentario</p>";
							echo "</div>";
						}*/
					//echo "</div>";
				}
					
			?>
			
			<form action="Validacion/valida_foro_pub.php" method="post" enctype="multipart/form-data">
				<div>
					<label>Publicacion:</label>
					<textarea id="texPub" rows="4" name="publicacion"></textarea>
				</div>

				<div id="color3" class="botones">
				    <button class="boton" type="submit" >Publicar</button>
				</div>
			</form>

			</div>


		<script>
			function displayResponder()
			{
				var comentar= document.getElementById("comentar");
				var display= comentar.style.display;

				if(display == "none")
					comentar.style.display= "block";
				else
					comentar.style.display = "none";
			}
		</script>
	</body>
</html>