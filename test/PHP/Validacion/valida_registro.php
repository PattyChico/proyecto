<meta charset="utf-8">
<?php
class usuario
{
	public $nombre;
	public $paterno;
	public $materno;
	public $correo;
	public $sexo;
	public $nacimiento;
	public $nick;
	public $pass;
	public $pass2;
	public $id;
	public $tema;

	function asignacion()
	{
		$this->nombre= $_POST['nombre'];
		$this->paterno= $_POST['paterno']; 
		$this->materno= $_POST['materno']; 
		$this->correo= $_POST['correo'];
		$this->sexo= $_POST['sexo'];
		$this->nacimiento= $_POST['nacimiento'];
		$this->nick= $_POST['nick'];
		$this->pass= $_POST['contraseña'];
		$this->pass2= $_POST['contraseña2'];
		$this->tema= $_POST['tema'];

		/*foreach ($this->tema as $team)
		{
			echo $team, "<br>";
		}*/
	}

	function registrar()
	{
		//$user= "user_write";
		//$password= "12345";

		$user= "root";
		$password= "";
		try
		{
			//Conectamos a la base de datos
			$conexion= new PDO('mysql:host=localhost; dbname=ia', $user, $password);
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$band='0';
			$sql ="SELECT nick FROM login";
			$datos=$conexion->query($sql);
			foreach ($datos as $resultado) 
			{
				if($resultado['nick'] == $this->nick)
				{
					$band='1';
					echo  '<script type="text/javascript"> alert("El usuario ya existe");</script>'; //Imprime un alerta
					echo '<script type="text/javascript"> document.location = "../registro.php"; </script>';//se redirecciona
				}
			}
			if($band=='0' and $this->pass == $this->pass2)//La contraseña coincide y si el usuario no existe
			{
				//Insertamos valores a la tabla usuario
				$sql= "INSERT INTO usuario(nombre, a_paterno, a_materno, tipo, correo, sexo, fecha_nacimiento) VALUES ('$this->nombre','$this->paterno', '$this->materno', '0', '$this->correo', '$this->sexo', '$this->nacimiento') ";
				$conexion->exec($sql);

				//Buscamos el id del usuario
				$buscaID="SELECT id_usuario FROM usuario WHERE nombre='$this->nombre' and a_paterno='$this->paterno' and a_materno='$this->materno' ";
				$datos=$conexion->query($buscaID);
				foreach ($datos as $resultado ) 
				{
					$idUsuario=$resultado['id_usuario'];
				}
				$this->id=$idUsuario;//id del usuario que se registro

				//Insertamos datos para la tabla login con su respectivo id usuario
				$sql= "INSERT INTO login(nick, password, id_usuario) VALUES('$this->nick', '$this->pass', '$this->id')";
				$conexion->exec($sql);

				//Insertar temas para el usuario
				foreach ($this->tema as $team)
				{
					$sql="INSERT INTO usuario_tema(id_usuario, id_tema) VALUES ('$this->id', '$team')";
					$conexion->exec($sql);
				}

				//Guardamos la imagen en el directorio y almacenamos el nombre de la imagen en la base de datos
				if(isset($_FILES['imagen']) && $_FILES['imagen']['error']==0 )//no es vacio
				{
					$nombre= $_FILES['imagen']['name'];
					$tipo= $_FILES['imagen']['type'];
					
					//Almacenamos la imagen en el directorio
					if(($_FILES['imagen']['type'] == "image/gif")||($_FILES['imagen']['type'] == "image/jpeg")||($_FILES['imagen']['type'] == "image/jpg")||($_FILES['imagen']['type'] == "image/png"))
					{
						//Ruta donde se guardaran las imagenes que subamos
						$directorio= $_SERVER['DOCUMENT_ROOT'].'/InteligenciaArtificial/Imagenes/Usuarios/';
						//Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
						move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio.$nombre);
					}
					else
						echo "No se puede subir la imagen con este formato";

					//Almacenamos el nombre de la imagen en la base de datos
					$sql= "UPDATE usuario SET imagen='$nombre' WHERE id_usuario='$this->id' ";
					$stmt=$conexion->prepare($sql);
					$stmt->execute();
					//echo $stmt->rowCount() , "records update";
				}
				



				echo  '<script type="text/javascript"> alert("Usuario registrado");</script>'; //Imprime un alerta
				echo '<script type="text/javascript"> document.location = "../../index.html"; </script>';//se redirecciona
			}
			else
			{
				echo  '<script type="text/javascript"> alert("La contraseña no coincide");</script>'; //Imprime un alerta
				echo '<script type="text/javascript"> document.location = "../registro.php"; </script>';//se redirecciona
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
$usuario->registrar();
?>