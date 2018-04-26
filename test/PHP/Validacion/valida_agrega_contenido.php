<meta charset="utf-8">
<?php
class usuario 
{
	public $tema;
	public $imagen;
	public $subtema;
	public $parrafo;
	public $id_tema;

	function asignacion()
	{
		$this->tema=$_POST['tema'];
		//$this->imagen=$_POST['imagen'];
		$this->subtema=$_POST['subtema'];
		$this->parrafo=$_POST['parrafo'];
	}

	function agrega()
	{
		include('../Conexion/conexion.php');
		$sql="INSERT INTO temas(nombre) VALUES('$this->tema')";
		$conexion->exec($sql);
		
		$sql="SELECT id_tema FROM temas WHERE nombre='$this->tema' ";
		$datos=$conexion->query($sql);	
		foreach($datos as $resultado)
			$this->id_tema=$resultado['id_tema'];

		$sql="INSERT INTO contenido(nom_subtema, parrafo, id_tema) VALUES('$this->subtema', '$this->parrafo', '$this->id_tema')";
		$conexion->query($sql);

		if(isset($_FILES['imagen']) && $_FILES['imagen']['error']==0 )//no es vacio
		{
		//Guardamos la imagen en el directorio y almacenamos el nombre de la imagen en la base de datos
				$nombre= $_FILES['imagen']['name'];
				$tipo= $_FILES['imagen']['type'];
		//Almacenamos la imagen en el directorio
				if(($_FILES['imagen']['type'] == "image/gif")||($_FILES['imagen']['type'] == "image/jpeg")||($_FILES['imagen']['type'] == "image/jpg")||($_FILES['imagen']['type'] == "image/png"))
				{
					//Ruta donde se guardaran las imagenes que subamos
					$directorio= $_SERVER['DOCUMENT_ROOT'].'/InteligenciaArtificial/Imagenes/Contenido/';
					//Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
					move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio.$nombre);
				}
				else
					echo "No se puede subir la imagen con este formato";

				//Almacenamos el nombre de la imagen en la base de datos
				$sql= "UPDATE contenido SET imagen='$nombre' WHERE id_tema='$this->id_tema' ";
				$stmt=$conexion->prepare($sql);
				$stmt->execute();
		}


		echo  '<script type="text/javascript"> alert("Temas modificados");</script>'; //Imprime un alerta
		echo '<script type="text/javascript"> document.location = "../administrador.php"; </script>';//se redirecciona
	}
}
$usuario= new usuario;
$usuario->asignacion();
$usuario->agrega();

?>