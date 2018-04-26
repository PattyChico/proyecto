<!DOCTYPE html>
<html>
	<head>
		<title>Programacion en C++</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../CSS/normalize.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Index.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Usuarios.css">
	</head>
	<body>
		<header>
			<p>Programacion en C++</p>
		</header>

		<!--<figure>
			<img src="../Imagenes/Imagen11.png">
		</figure>-->
		<section id="usuarios">
			<div id="link"  class="menu_principal"><!--Cerrar sesion-->
				<a class="nameFirst" href="foro.php">Foro</a>
			</div>

			<div class="menu_principal"><!--MODIFICAR INFORMACION-->
				<p onClick="displayModificaInf()" class="nameFirst">Modificar informacion personal</p>
				<div class="contenido" id="modificaInf">
					<form method="post" action="Validacion/valida_cambio_datos.php">
						<?php
							include('Conexion/conexion.php');
							session_start();
							$id_usuario=$_SESSION["id_usuario"];

							$nombre=$_SESSION["nombre"];
							$paterno=$_SESSION["paterno"];
							$materno=$_SESSION["materno"];
							//$tipo=$_SESSION["tipo"];
							$correo=$_SESSION["correo"];
							$sexo=$_SESSION["sexo"];
							$nacimiento=$_SESSION["nacimiento"];
							$imagen=$_SESSION["imagen"];
							$nick=$_SESSION["nick"];
							$contraseña=$_SESSION["password"];



							echo "<div>";
								echo "<label>Nombre:</label>";
								echo "<input type='text' name='nombre' value='$nombre' required>";
							echo "</div>";

							echo "<div>";
								echo "<label>Apellido paterno:</label>";
								echo "<input type='text' name='paterno' value='$paterno' required>";
							echo "</div>";

							echo "<div>";
								echo "<label>Apellido materno:</label>";
								echo "<input type='text' name='materno' value='$materno' required>";
							echo "</div>";

							echo "<div>";
								echo "<label>Email:</label>";
								echo "<input type='email' name='correo' value='$correo' required>";
							echo "</div>";

							/*echo "<div>";
								echo "<label>Usuario:</label>";
								echo " <input type='text' name='nick' required>";
							echo "</div>";

							echo "<div>";
								echo "<label>Contraseña:</label>";
								echo "<input type='password' name='contraseña' required>";
							echo "</div>";

							echo "<div>";
								echo "<label> Repite la contraseña:</label>";
								echo "<input type='password' name='contraseña2' required>";
							echo "</div>";
							*/

							echo "<div id='imagen'>";
								echo "<figure><img src='../Imagenes/Usuarios/$imagen'></figure>";
								echo "<label>Imagen</label>";
								echo "<input id='imagen' type='file' name='imagen'>";
							echo "</div>";

							echo "<div class='radio'>";
								echo "<p>Selecciona tu sexo:</p>";
								if($sexo=='femenino')
								{
									echo "<label>";
										echo "<input class='opciones' type='radio' name='sexo' value='femenino' checked>";
									echo "Femenino</label>";

									echo "<label>";
										echo "<input class='opciones' type='radio' name='sexo' value='masculino'>";
									echo "Masculino </label>";
								}
								else
								{
									echo "<label>";
									echo "<input class='opciones' type='radio' name='sexo' value='femenino'>";
									echo "Femenino</label>";

									echo "<label>";
									echo "<input class='opciones' type='radio' name='sexo' value='masculino' checked>";
									echo "Masculino </label>";
								}
								
							echo "</div>";

							echo "<div>";
								echo "<label>Fecha de nacimiento:</label>";
								echo "<input type='text' name='nacimiento' value='$nacimiento' required>";
							echo "</div>";
						?>
						<div id="color1" class="botones">
						    <button class="boton" type="submit" >Guardar</button>
						</div>
					</form>
				</div>
			</div>

			<div class="menu_principal"><!--MODIFICA CONTENIDO-->
				<p onClick="displayModificaCont()" class="nameFirst">Modificar preferencias</p>
				<div class="contenido" id="modificaCont">
					<form action="Validacion/valida_cambio_temas.php" method="post">
						<div class="checkbox">
							<p> Selecciona tus temas favoritos: </p>
							<?php
								include('Conexion/conexion.php');
								$sql= "SELECT id_tema, nombre FROM temas";
								$datos=$conexion->query($sql);
								foreach($datos as $resultados)
								{
									$id_tema=$resultados['id_tema'];
									$nombre_tema=$resultados['nombre'];

									echo "<label>";
									echo "<input class='opciones' type='checkbox' name='tema[]' value='$id_tema' >";
									echo $nombre_tema;
									echo "</label>";
								}
							?>
						</div>
						<div id="color2" class="botones">
						    <button class="boton" type="submit" >Guardar</button>
						</div>
					</form>
				</div>
			</div>

			<div id="link" class="menu_principal"><!--Cerrar sesion-->
				<a class="nameFirst" href="logout.php">Salir</a>
			</div>

		</section>

		<script>
			/*function displayUsuariosReg()
			{
				var usuariosReg= document.getElementById("usuariosReg");
				var display= usuariosReg.style.display;

				if(display == "none")
					usuariosReg.style.display= "block";
				else
					usuariosReg.style.display = "none";
			}*/
			function displayModificaInf()
			{
				var modificaInf= document.getElementById("modificaInf");
				var display= modificaInf.style.display;

				if(display == "none")
					modificaInf.style.display="block";
				else
					modificaInf.style.display="none";
			}

			function displayModificaCont()
			{
				var modificaCont= document.getElementById("modificaCont");
				var display= modificaCont.style.display;

				if(display == "none")
					modificaCont.style.display="block";
				else
					modificaCont.style.display="none";
			}

			/*function displayAgregaCont()
			{
				var agregaCont= document.getElementById("agregaCont");
				var display= agregaCont.style.display;

				if(display == "none")
					agregaCont.style.display= "block";
				else
					agregaCont.style.display = "none";
				//var display;
				//var secundario= document.getElementsByClassName("secundario");
				//for(var i=0, l=secundario.length; i<l; i++)
				//{
				//	secundario[i].style.display="block";
				//}
			}*/

		</script>

	</body>
</html>