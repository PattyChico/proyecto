<?php
class usuario
{
	public $mensaje;
	public $id_usuario;

	function asignacion()
	{
		$this->mensaje=$_POST['mensaje'];
		session_start();
		$this->id_usuario=$_SESSION["id_usuario"];

	}
	function insertar_datos()
	{
			require_once('../Conexion/conexion.php');
			//Insertamos en la tabla formulario el mensaje, donde formulario.usuario_id_usuario=login.usuario_id_usuario
			$sql= "INSERT INTO formulario (mensaje, id_usuario) VALUES ('$this->mensaje','$this->id_usuario')";
			$conexion->exec($sql);
			$conexion= null;

			echo  '<script type="text/javascript"> alert("Mensaje enviado");</script>'; //Imprime un alerta
			echo '<script type="text/javascript"> document.location = "../formulario.php"; </script>';//se redirecciona
	}
	function mostrar_informacion()
	{
			require_once('../Conexion/conexion.php');
			$sql= "SELECT usuario.nombre, usuario.a_paterno, usuario.a_materno, login.nick, formulario.mensaje FROM usuario inner join login on usuario.id_usuario=login.usuario_id_usuario inner join formulario on usuario.id_usuario=formulario.usuario_id_usuario WHERE login.nick='$this->nick' ";
			
			$datos=$conexion->query($sql);

			//foreach ($conexion->query($sql)
			foreach ($datos as $resultado ) 
			{
				//print_r($resultado);
				$nombre=$resultado['nombre'];
				$paterno= $resultado['a_paterno'];
				$materno= $resultado['a_materno'];
				$nick= $resultado['nick'];
				$mensaje= $resultado['mensaje'];

				echo "Nombre: ", $nombre," ", $paterno , " " , $materno, "<br>";
				echo "Usuario: ", $nick, "<br>";
				echo "Mensaje: ", $mensaje, "<br>";
			}		
			$conexion= null;
	}
}
$usuario1 = new usuario;
$usuario1->asignacion();
$usuario1->insertar_datos();
//$usuario1->mostrar_informacion();
?>
