<?php
		$user= "root";
		$password= "";

		try
		{
			//Conectamos a la base de datos
			$conexion= new PDO('mysql:host=localhost; dbname=ia', $user, $password);
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $ex)
		{
			echo "Conexion fallida: " . $ex->getMessage();
		}
?>