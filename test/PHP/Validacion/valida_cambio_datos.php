<meta charset="utf-8">
<?php
	class usuario
	{
		public $id_usuario;
		public $nombre;
		public $paterno;
		public $materno;
		public $correo;
		public $sexo;
		public $nacimiento;
		public $imagen;
		public $tipo;
	
		function asignacion()
		{
			$this->nombre=$_POST['nombre'];
			$this->paterno=$_POST['paterno'];
			$this->materno=$_POST['materno'];
			$this->correo=$_POST['correo'];
			$this->sexo=$_POST['sexo'];
			$this->nacimiento=$_POST['nacimiento'];
			//$this->imagen=$_POST['imagen'];

			session_start();
			$this->id_usuario=$_SESSION["id_usuario"];
			$this->tipo=$_SESSION["tipo"];
		}
		function variablesSesion()
		{
			$_SESSION["nombre"]=$this->nombre;
			$_SESSION["paterno"]=$this->paterno;
			$_SESSION["materno"]=$this->materno;
			$_SESSION["correo"]=$this->correo;
			$_SESSION["sexo"]=$this->sexo;
			$_SESSION["nacimiento"]=$this->nacimiento;		
		}
		function cambioDatosPersonales()
		{
			include('../Conexion/conexion.php');
			$sql="UPDATE usuario SET nombre='$this->nombre', a_paterno='$this->paterno', a_materno='$this->materno', correo='$this->correo', sexo='$this->sexo', fecha_nacimiento='$this->nacimiento' WHERE id_usuario=$this->id_usuario ";
			$stmt=$conexion->prepare($sql);
			$stmt->execute();

			echo "no entro";
			if(isset($_FILES['imagen']) && $_FILES['imagen']['error']==0 )//no es vacio
			{
				echo "entro";
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

					$this->imagen=$nombre;
					$_SESSION["imagen"]=$this->imagen;	
			}

			echo  '<script type="text/javascript"> alert("Datos personales modificados");</script>'; //Imprime un alerta
			if($this->tipo=='1')//ADMINISTRADOR
			{
				//echo '<script type="text/javascript"> document.location = "../administrador.php"; </script>';//se redirecciona
			}
			else//USUARIO
			{
				echo '<script type="text/javascript"> document.location = "../usuario.php"; </script>';//se redirecciona
			}
			
		}
	}
	$usuario= new usuario;
	$usuario->asignacion();
	$usuario->cambioDatosPersonales();
	$usuario->variablesSesion();
?>