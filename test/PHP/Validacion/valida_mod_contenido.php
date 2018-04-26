<meta charset="utf-8">
<?php
class usuario
{
	public $tema;
	public $imagen;
	public $subtema;
	public $parrafo;
	public $id_subtema;
	public $id_tema;

	function asignacion()
	{
		$this->tema= $_POST['tema'];
		//$this->imagen= $_POST['imagen'];
		$this->subtema= $_POST['subtema'];
		$this->parrafo= $_POST['parrafo'];
	}

	function modifica()
	{
		include('../Conexion/conexion.php');
		$sql="SELECT id_contenido, id_tema FROM contenido WHERE nom_subtema='$this->subtema' ";
		$datos=$conexion->query($sql);
		foreach ($datos as $resultado) 
		{
			$this->id_subtema=$resultado['id_contenido'];
			$this->id_tema=$resultado['id_tema'];
		}
	
		$sql="UPDATE contenido SET nom_subtema='$this->subtema', parrafo='$this->parrafo' WHERE id_contenido='$this->id_subtema' ";
		$tmp=$conexion->prepare($sql);
		$tmp->execute();

		$sql="UPDATE temas SET nombre='$this->tema' WHERE id_tema='$this->id_tema' ";
		$tmp=$conexion->prepare($sql);
		$tmp->execute();

		$sql="UPDATE temas SET fecha=current_timestamp WHERE id_tema='$this->id_tema' ";
		$datos=$conexion->prepare($sql);
		$datos->execute();

		echo  '<script type="text/javascript"> alert("Temas modificados");</script>'; //Imprime un alerta
		echo '<script type="text/javascript"> document.location = "../administrador.php"; </script>';//se redirecciona
	}
}
	$usuario= new usuario;
	$usuario->asignacion();
	$usuario->modifica();

?>