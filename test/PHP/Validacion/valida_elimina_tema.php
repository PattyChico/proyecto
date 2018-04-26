<meta charset="utf-8">
<?php
	class usuario
	{
		public $id_tema;

		
		function eliminaTema()
		{
			$this->id_tema= $_POST['elimina'];
			include('../Conexion/conexion.php');
			foreach($this->id_tema as $resultado)
			{
				$sql="DELETE FROM contenido WHERE id_tema='$resultado' ";
				$conexion->exec($sql);
		
				$sql="DELETE FROM usuario_tema WHERE id_tema='$resultado' ";
				$conexion->exec($sql);

				$sql="DELETE FROM temas WHERE id_tema='$resultado' ";
				$conexion->exec($sql);
			
				echo  '<script type="text/javascript"> alert("Temas eliminados");</script>'; //Imprime un alerta
				echo '<script type="text/javascript"> document.location = "../administrador.php"; </script>';//se redirecciona
			}
		}
	}
	$usuario= new usuario;
	$usuario->eliminaTema();
?>