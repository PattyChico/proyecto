<!DOCTYPE html>
<html>
<head>
	<title>Programacion en C++</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../CSS/normalize.css">
	<link rel="stylesheet" type="text/css" href="../CSS/Index.css">
</head>
<body>
	<header>
		<p>Formulario</p>
	</header>
	<!--<figure>
			<img src="../Imagenes/Imagen11.png">
	</figure>-->

	<form action="Validacion/valida_formulario.php" method="post">	  
		<!--<div>
			<label>Usuario:</label>
			<input type="text" name="nick" placeholder="Ingresa tu usuario" required>
		</div>

		<div>
			<label>Contraseña:</label>
			<input type="password" name="password" placeholder="Ingresa tu contraseña" required>
		</div>-->
		
		<div>
			<label>Mensaje:</label>
			<textarea name="mensaje" rows= '6' placeholder="Escribe tu mensaje" required></textarea>
		</div>

		<div id="color1" class="botones">
	    	<button class="boton" type="submit" >Enviar</button>
		</div>

		<div id="color4" class="botones">
			<a class="boton" href="registro.php">Cancelar</a>
		</div>

	</form>
</body>
</html>