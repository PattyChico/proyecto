<meta charset="utf-8">
<?php
	class usuario
	{
		public $id_tema;
		public $id_usuario;

		
		function cambiaTema()
		{
			session_start();
			$this->id_usuario=$_SESSION["id_usuario"];
			$this->id_tema=$_POST['tema'];//pasamos el id del tema
			include('../Conexion/conexion.php');
			$sql= "DELETE FROM usuario_tema WHERE id_usuario='$this->id_usuario' ";
			$conexion->exec($sql);

			foreach ($this->id_tema as $resultado)
			{
				$sql="INSERT INTO usuario_tema(id_usuario, id_tema) VALUES ('$this->id_usuario', '$resultado')";
				$conexion->exec($sql);
			}
			echo  '<script type="text/javascript"> alert("Temas cambiados");</script>'; //Imprime un alerta
			echo '<script type="text/javascript"> document.location = "../usuario.php"; </script>';//se redirecciona
		}
	}
	$usuario= new usuario;
	$usuario->cambiaTema();
?>