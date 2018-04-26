<meta charset="utf-8">
<?php
	class usuario
	{
		public $id_publicacion;
		public $id_usuario;
		public $comentario;

		function asignacion()
		{
			$this->comentario=$_POST['comentario'];
			session_start();
			$this->id_usuario=$_SESSION["id_usuario"];
			$this->id_publicacion=$_POST["id_publicacion"];
		}

		function comentario()
		{
			include('../Conexion/conexion.php');
			$sql="INSERT INTO comentarios(comentario, id_publicacion, id_usuario) VALUES('$this->comentario', '$this->id_publicacion', '$this->id_usuario')";
			$conexion->exec($sql);

			echo  '<script type="text/javascript"> alert("Comentario enviado");</script>'; //Imprime un alerta
			echo '<script type="text/javascript"> document.location = "../foro.php"; </script>';//se redirecciona
			//echo "comentario: ", $this->comentario, "id usuario: ", $this->id_usuario, "id publicacion ", $this->id_publicacion;
		}

	}
$usuario= new usuario;
$usuario->asignacion();
$usuario->comentario();

?>