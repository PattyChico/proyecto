<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Programacion en C++</title> 
    <script src="CSS/modernizr-custom.js"> </script>
	<link rel="stylesheet" type="text/css" href="../CSS/normalize.css"> 
	<link rel="stylesheet" type="text/css" href="../CSS/Ia.css">
</head>
<body>
	<header>
		<nav>
			<!--<ul id="menu_celular">-->
				<!--<div id="menu_cel"> -->
						<p onClick="displayMenu()" id="menu_cel">MENU</p>
				<!--</div>-->

				<ul id="menu">
					<li class="menu_principal">
						<a href="#InteligenciaArtificial" class="dropbtn">Programacion c++</a>
						<ul class="menu_secundario">
							<li><a href="#QueEs"> ¿Que es?</a></li>
							<li><a href="#Caracteristicas">Caracteristicas</a></li>
						</ul>
					</li>

					<li class="menu_principal">
				    	<a href="#Historia" class="dropbtn">Historia</a>
						<ul class="menu_secundario">
							<li><a href="#Historia">Historia</a></li>
							<li><a href="#Futuro">Futuro</a></li>
						</ul>	
					</li>

					<li class="menu_principal">
						<a href="#Aplicaciones" class="dropbtn">Aplicaciones</a>
						<ul class="menu_secundario">
							<li><a href="#Juegos">Programas</a></li>
							<li><a href="#Robotica">Herencia</a></li>
						</ul>
					</li>

					<li class="menu_principal">
						<a href="#Criticas" class="dropbtn">Criticas</a>
						<ul class="menu_secundario">
							<li><a href="#Ventajas">Ventajas</a></li>
							<li><a href="#Desventajas">Desventajas</a></li>
						</ul>	
					</li>

					<li class="menu_principal">
						<a href="#Mas" class="dropbtn">Mas</a>
						<ul class="menu_secundario">
							<li><a href="#Investigadores">Investigadores</a></li>
							<li><a href="#Videos">Videos</a></li>
						</ul>		
					</li>
				</ul>
			<!--</ul>-->
		</nav>
		<?php
			

		
	/*</header>
	<section id="InteligenciaArtificial"> <br><br>
		<p class="Titulo" >INTELIGENCIA ARTIFICIAL</p>
	</section>

	<!-- Contenido seguin el usuario -->
	<meta charset="utf-8">*/
	class Usuario
		{
			public $id;
			public $tipo;
			public $nombre;
			public $imagen;

			function asignacion()
			{
				$invitado=$_GET['invitado'];
				if($invitado=="1")//invitado activado
				{
					$this->id="0";
					$this->tipo="-1";
					echo "</header>";
				}
				else//usuario registrado
				{
					session_start();
					$this->id=$_SESSION["id_usuario"];
					$this->tipo=$_SESSION["tipo"];
					$this->nombre=$_SESSION["nombre"];
					$this->imagen=$_SESSION["imagen"];

					$this->imagen();//Muestra imagen y nombre del usuario
				}
			}
			function imagen()
			{
				echo "<div id='user'>";
				echo "<figure id='imgUser'>";
					echo "<img src='../Imagenes/Usuarios/$this->imagen'>";
				echo "<figure>";
				if($this->tipo=="1")
					echo "<a id='nameUser' href='administrador.php'>Administrador</a>";
				else
					echo "<a id='nameUser' href='usuario.php'>$this->nombre</a>";

				echo "</div>";
				echo "</header>";
			}

			function tipo_usuario()
			{
				//-1 Usuario invitado 
				//0 Usuario
				//1 Administrador
				$this->asignacion();
				//echo "tipo: ", $this->tipo;

					if($this->tipo=='-1')//Usuario invitado
						$this->contenido_invitado();
					elseif($this->tipo=='0')//Usuario
					{
						//echo "usuario id: ", $this->id;
						$this->contenido_usuario();

					}
					elseif($this->tipo=='1')//Administrador
					{
						//echo "administrador: ", $this->id;
						$this->contenido_invitado();
					}
			}

			function contenido_invitado()
			{
					echo "<section id='InteligenciaArtificial'> <br><br>";
						echo"<p class='Titulo' >Programacion en C++</p>";
					echo "</section>";
					require_once('Conexion/conexion.php');
					$sql= "SELECT id_tema FROM temas";
					$datos=$conexion->query($sql) ;
					$i="0";
					foreach ($datos as $resultados) 
					{
						//crear un arreglo y almacenar todos los temas_id_tema
						$team[$i]=$resultados['id_tema'];
						$i++;
					}
					for($x=0; $x<$i; $x++) 
					{
						//Imprime los parrafos, titulos e imagenes
						echo "<br><br>";
						$sql= "SELECT temas.nombre, contenido.nom_subtema, contenido.parrafo, contenido.imagen FROM temas inner join contenido on temas.id_tema=contenido.id_tema WHERE temas.id_tema='$team[$x]' ";
						$datos=$conexion->query($sql);
						foreach ($datos as $resultados) 
						{
							$titulo=$resultados['nombre'];
							$subtitulo=$resultados['nom_subtema'];
							$parrafo=$resultados['parrafo'];
							$imgUrl=$resultados['imagen'];


							//echo "<section id= $titulo>";
							//	echo "<p class='titulo'>$titulo</p>";
								echo "<div id= $subtitulo class='tema' >";
									echo "<figure class=imagen ><img src= ../Imagenes/Contenido/$imgUrl > </figure>";
									echo "<p class='texto' class='SubTitulo'> $subtitulo</p>";
									echo "<p class='texto'> $parrafo </p>";
								echo "</div>";
							//echo "</section>";
						}
					}

			}

			function contenido_usuario()
			{
					echo "<section id='InteligenciaArtificial'> <br><br>";
						echo"<p class='Titulo' >programacion en C++</p>";
					echo "</section>";
					require_once('Conexion/conexion.php');
					$sql= "SELECT id_tema FROM usuario_tema WHERE id_usuario='$this->id' ";
					$datos=$conexion->query($sql) ;
					$i="0";
					foreach ($datos as $resultados) 
					{
						//crear un arreglo y almacenar todos los temas_id_tema
						$team[$i]=$resultados['id_tema'];
						$i++;
					}
					for($x=0; $x<$i; $x++) 
					{
						//Imprime los parrafos, titulos e imagenes
						echo "<br><br>";
						$sql= "SELECT temas.nombre, contenido.nom_subtema, contenido.parrafo, contenido.imagen FROM temas inner join contenido on temas.id_tema=contenido.id_tema WHERE temas.id_tema='$team[$x]' ";
						$datos=$conexion->query($sql);
						foreach ($datos as $resultados) 
						{
							$titulo=$resultados['nombre'];
							$subtitulo=$resultados['nom_subtema'];
							$parrafo=$resultados['parrafo'];
							$imgUrl=$resultados['imagen'];


							//echo "<section id= $titulo>";
							//	echo "<p class='titulo'>$titulo</p>";
								echo "<div id= $subtitulo class='tema' >";
									echo "<figure class=imagen ><img src= ../Imagenes/Contenido/$imgUrl > </figure>";
									echo "<p class='texto' class='SubTitulo'> $subtitulo</p>";
									echo "<p class='texto'> $parrafo </p>";
								echo "</div>";
							//echo "</section>";
						}
					}

			}
		}

		$usuario= new usuario;
		$usuario->tipo_usuario();
		//$usuario->asignacion();
		//$usuario->texto();
	?>

	<footer>

		<p class="informacion">INFORMACION:</p>
		<p>Telefono: 222-107-25-05</p>
		<p>Correo: programa_facil@gmail.com</p>
		<p class="informacion">BUSCANOS EN NUESTRAS REDES SOCIALES:</p>

		<figure id="RedesSociales">
			<a target="_blank" href="www.facebook.com/"><img src="../Imagenes/Sociales1.png"></a>
			<a target="_blank" href="www.twitter.com/ProgramacionOficial"><img src="../Imagenes/Sociales2.png"></a>
			<a target="_blank" href="file:///C:/Users/TELMEX/Documents/Ingrid/TecnologiaWeb/InteligenciaArtificial.html#InteligenciaArtificial"><img src="../Imagenes/Sociales3.png"></a>
		</figure>
		<a id="formulario" href="formulario.php">Formulario</a>

	</footer>

	<script type="text/javascript">
		function displayMenu()
		{
			var menu= document.getElementById("menu");
			var display= menu.style.display;

			if(display == "none")
				menu.style.display= "block";
			else
				menu.style.display = "none";
		}
	</script>
</body>
</html>