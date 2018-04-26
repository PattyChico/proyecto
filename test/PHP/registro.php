<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Programacion en C++</title>
		<link rel="stylesheet" type="text/css" href="../CSS/normalize.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Index.css">
		<!--<link rel="stylesheet" type="text/css" href="../CSS/registro.css">-->
	</head>
	<body>

		<header>
			<p>Registro</p>
		</header>

		<form action="Validacion/valida_registro.php" method="post" enctype="multipart/form-data">
			<div>
				<label>Nombre:</label>
				<input type="text" name="nombre"  required>
			</div>

			<div>
				<label>Apellido paterno:</label>
				<input type="text" name="paterno" required>
			</div>

			<div>
				<label>Apellido materno:</label>
				<input type="text" name="materno" required>
			</div>

			<div>
				<label>Email:</label>
				<input type="email" name="correo" required>
			</div>

			<div>
				<label>Usuario:</label>
				<input type="text" name="nick" required>
			</div>

			<div>
				<label>Contraseña:</label>
				<input type="password" name="contraseña" required>
			</div>

			<div>
				<label> Repite la contraseña:</label>
				<input type="password" name="contraseña2" required>
			</div>

			<div id="imagen">
				<label>Imagen</label>
				<input id="imagen" type="file" name="imagen">
			</div>

			<!--<div>
				<label>Sexo:</label>
				<input type="text" name="sexo" placeholder="Introduce sexo" required>
			</div>-->
			<div class="radio">
				<p>Selecciona tu sexo:</p>
				<label>
					<input class="opciones" type="radio" name="sexo" value="femenino" checked>
					Femenino
				</label>

				<label>
					<input class="opciones" type="radio" name="sexo" value="masculino">
					Masculino
				</label>

			</div>

			<div>
				<label>Fecha de nacimiento:</label>
				<input type="text" name="nacimiento" required>
			</div>

			<!--<div class="checkbox">
				<p> Selecciona tus temas favoritos: </p>
				<label>
					<input class="opciones" type="checkbox" name="tema[]" value="Inteligencia Artificial">
					Inteligencia Artificial
				</label>

				<label>
					<input class="opciones" type="checkbox" name="tema[]" value="Historia">
					Historia
				</label>

				<label>
					<input class="opciones" type="checkbox" name="tema[]" value="Aplicaciones">
					Aplicaciones
				</label>

				<label>
					<input class="opciones" type="checkbox" name="tema[]" value="Criticas">
					Criticas
				</label>

				<label>
					<input class="opciones" type="checkbox" name="tema[]" value="Mas">
					Mas
				</label>
			</div>-->
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
		
			<div id="color3" class="botones">
			    <button class="boton" type="submit" >Enviar</button>
			</div>

			<div id="color4" class="botones">
					<a class="boton" href="registro.php">Cancelar</a>
			</div>
		</form>
	</body>
</html>