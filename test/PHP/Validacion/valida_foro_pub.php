<meta charset="utf-8">
<?php
	class usuario
	{
		public $id_usuario;
		public $publicacion;

		function asignacion()
		{
			$this->publicacion=$_POST['publicacion'];
			session_start();
			$this->id_usuario=$_SESSION["id_usuario"];
		}

		function publicacion()
		{
			include('../Conexion/conexion.php');

			$sql="INSERT INTO foro(publicacion, id_usuario) VALUES('$this->publicacion', '$this->id_usuario')";
			$conexion->exec($sql);

			echo  '<script type="text/javascript"> alert("Publicacion exitosa");</script>'; //Imprime un alerta
			echo '<script type="text/javascript"> document.location = "../foro.php"; </script>';//se redirecciona
		}
	}

$usuario= new usuario;
$usuario->asignacion();
$usuario->publicacion();
?>