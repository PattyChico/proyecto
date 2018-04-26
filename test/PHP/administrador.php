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
			<p>Administrador</p>
		</header>
		<section id="usuarios">

			<div class="menu_principal"><!--Usuarios Registrados-->
				<p onClick="displayUsuariosReg()" class="nameFirst">Usuarios Registrados</p>
				<div class="contenido" id="usuariosReg">
					<table>
						<tr>
							<!--<th class="tema">Action</th>-->
							<th class="tema">Nombre</th>
							<th class="tema">Usuario</th>
							<th class="tema">Imagen</th>
						</tr>
						<?php
							include('Conexion/conexion.php');
							$sql="SELECT usuario.id_usuario, usuario.nombre, usuario.a_paterno, usuario.a_materno, login.nick, usuario.imagen FROM usuario inner join login on usuario.id_usuario=login.id_usuario ";
							$datos=$conexion->query($sql);
							foreach($datos as $resultados)
							{
								$id_usuario= $resultados['id_usuario'];
								$nombre= $resultados['nombre'];
								$paterno= $resultados['a_paterno'];
								$materno= $resultados['a_materno'];
								$nick= $resultados['nick'];
								$imagen= $resultados['imagen'];

								echo "<tr>";
								//echo "<th><input type='radio' name='usuario' value='$id_usuario'></th>";
								echo "<th>$nombre $paterno $materno</th>";
								echo "<th>$nick</th>";
								echo "<th><figure id='imgUser'><img src='../Imagenes/Usuarios/$imagen'></figure></th>";
								echo "</tr>";
							}
							$conexion=null;
						?>
					</table>

					<!--<div id="color4" class="botones">
				    	<a class="boton" href="Validacion/valida_elimina_usuario.php">Eliminar</a>
					</div>

					<div id="color1" class="botones">
						<a class="boton" href="modifica_usuario.php">Modificar</a>
					</div>-->

					<!--<div id="color2" class="botones">
						<a class="boton" href="PHP/registro.php">Insertar</a>
					</div>-->
				</div>
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
	
						<div id="color3" class="botones">
							<button class="boton">Modificar</button>
						</div>
					</form>
				</div>
			</div>

			<div class="menu_principal"><!--MODIFICA CONTENIDO-->
				<p onClick="displayModificaCont()" class="nameFirst">Modifica contenido</p>
				<div class="contenido" id="modificaCont">
					<form method="post" action="mod_contenido.php">
						<table>
							<tr>
								<th class="tema">Modificar</th>
								<th class="tema">Contenido</th>
							</tr>
							<?php
								include('Conexion/conexion.php');
								$sql= "SELECT id_contenido, nom_subtema FROM contenido";
								//$sql= "SELECT id_tema, nombre FROM temas";
								$datos= $conexion->query($sql);
								foreach ($datos as $resultado) 
								{
									//$subtema= $resultado['nom_subtema'];
									$id_contenido= $resultado['id_contenido'];
									$subtema= $resultado['nom_subtema'];
									echo "<tr>";
										echo "<th class='opcion'> <input type='radio' name='modifica' value='$id_contenido'> </th>";
										//echo "<th>$subtema</th>";
										echo "<th>$subtema</th>";
									echo "</tr>";
								}
								$conexion=null;
							?>
						</table>
						<div id="color2" class="botones">
							<button class="boton">Modificar</button>
						</div>
					</form>
				</div>
			</div>
			<div class="menu_principal"><!--ELIMINA CONTENIDO-->
				<p onClick="displayEliminaCont()" class="nameFirst">Elimina contenido</p>	
				<div class="contenido" id="eliminaCont">
					<form method="post" action="Validacion/valida_elimina_tema.php">
						<table>
							<tr>
								<th class="tema">Elimina</th>
								<th class="tema">Contenido</th>
							</tr>
							<?php
								include('Conexion/conexion.php');
								$sql= "SELECT id_tema, nombre FROM temas";
								$datos= $conexion->query($sql);
								foreach ($datos as $resultado) 
								{
									$titulo= $resultado['nombre'];
									$id_tema= $resultado['id_tema'];
									echo "<tr>";
										echo "<th class='opcion'> <input type='checkbox' name='elimina[]' value='$id_tema'> </th>";
										echo "<th>$titulo</th>";
									echo "</tr>";
								}
								$conexion=null;
							?>
						</table>
						<div  id="color4" class="botones">
							<button class="boton">Eliminar</button>
						</div>
					</form>
				</div>
			</div>

			<div class="menu_principal"><!--AGREGA CONTENIDO-->
				<p onClick="displayAgregaCont()" class="nameFirst">Agrega contenido</p>
				<div class="contenido" id="agregaCont">
					<form action="Validacion/valida_agrega_contenido" method="post" enctype="multipart/form-data">
						<div>
							<label>Tema:</label>
							<input type="text" name="tema">
						</div>

						<div id="imagen">
							<label>Imagen:</label>
							<input id="imagen" type="file" name="imagen">
						</div>

						<div>
							<label>Subtema:</label>
							<input type="text" name="subtema">
						</div>

						<div>
							<label>Texto:</label>
							<textarea name="parrafo" rows= "12" required></textarea>
						</div>
						
						<div id="color2" class="botones">
							<button class="boton" type="submit">Agregar</button>
						</div>
					</form>
				</div>				
			</div>

			<div id="link"  class="menu_principal"><!--Foro-->
				<a class="nameFirst" href="foro.php">Foro</a>
			</div>

			<div id="link" class="menu_principal"><!--Reportes-->
				<a class="nameFirst" href="reportes.php">Reportes</a>
			</div>

			<div id="link" class="menu_principal"><!--Cerrar sesion-->
				<a class="nameFirst" href="logout.php">Salir</a>
			</div>

		</section>

		<script>
			function displayEliminaCont()
			{
				var eliminaCont= document.getElementById("eliminaCont");
				var display= eliminaCont.style.display;

				if(display == "none")
				{
					eliminaCont.style.display= "block";
				}
				else
				{
					eliminaCont.style.display = "none";
				}
			}


			function displayUsuariosReg()
			{
				var usuariosReg= document.getElementById("usuariosReg");
				var display= usuariosReg.style.display;

				if(display == "none")
					usuariosReg.style.display= "block";
				else
					usuariosReg.style.display = "none";
			}
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

			function displayAgregaCont()
			{
				var agregaCont= document.getElementById("agregaCont");
				var display= agregaCont.style.display;

				if(display == "none")
					agregaCont.style.display= "block";
				else
					agregaCont.style.display = "none";
				/*var display;
				var secundario= document.getElementsByClassName("secundario");
				for(var i=0, l=secundario.length; i<l; i++)
				{
					secundario[i].style.display="block";
				}*/
			}

		</script>

	</body>
</html>