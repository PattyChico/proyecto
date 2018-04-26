<meta charset="utf-8">
<?php
class Usuario
{
	public $id;

	function asignacion()
	{
		$this->id=$id;
	}

	function texto()
	{
		$user= "user_read";
		$password= "12345";

		try
		{
			//Conectamos a la base de datos
			$conexion= new PDO('mysql:host=localhost; dbname=ia', $user, $password);
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql= "SELECT temas_id_tema FROM usuario_tema WHERE usuario_id_usuario='$this->id' ";

			$datos=$conexion->query($sql) ;
			$i="0";
			foreach ($datos as $resultados) 
			{
				//crear un arreglo y almacenar todos los temas_id_tema
				$team[$i]=$resultados['temas_id_tema'];
				$i++;
				
			}
			for($x=0; $x<$i; $x++) 
			{
				//Imprime los parrafos y titulos
				echo "<br><br>";
				$sql= "SELECT temas.nombre, texto.parrafo, imagenes.url FROM temas inner join texto on temas.id_tema=texto.temas_id_tema inner join imagenes on temas.id_tema=imagenes.temas_id_tema WHERE temas.id_tema='$team[$x]' ";
				$datos=$conexion->query($sql);
				foreach ($datos as $resultados) 
				{
					$titulo=$resultados['nombre'];
					$parrafo=$resultados['parrafo'];
					$imgUrl=$resultados['url'];

					echo "<div id= $titulo >";
					echo "<figure class= imagen ><img src= $imgUrl ></figure>";
					echo "<p class= SubTitulo> $titulo </p>";
					echo "<p> $parrafo </p>";
					echo "</div>";
				}
			}

			$conexion= null;
		}
		catch(PDOException $ex)
		{
			echo "Conexion fallida: " . $ex->getMessage();
		}
	}
}

$usuario= new usuario;
$usuario->asignacion();
$usuario->texto();

?>