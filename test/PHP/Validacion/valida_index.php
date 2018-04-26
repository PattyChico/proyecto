<meta charset="utf-8">
<?php
class Usuario
{
	public $nick;
	public $password;
	public $id;
	public $tipo;

	function asignacion()
	{
		$this->nick=$_POST['nick'];
		$this->password=$_POST['password'];
		$this->id;
	}

	function datos()
	{
			/*	require_once('../Conexion/conexion-read.php');
				//include('../Conexion/conexion-read.php');
				$sql="SELECT usuario.id_usuario, usuario.nombre, usuario.a_paterno, usuario.a_materno, usuario.tipo, usuario.correo, usuario.sexo, usuario.fecha_nacimiento, usuario.imagen, login.nick, login.password FROM usuario inner join login on usuario.id_usuario=login.id_usuario WHERE usuario.id_usuario='$this->id'";
				//$stmt= $conexion->query($sql);
				$stmt= $conexion->prepare($sql);
				try
				{
					$stmt->execute();
				}
				catch(PDOException $ex)
				{
					print "¡Error!: ". $ex->getMessage() . "<br/>";
				}
				$total= $stmt->rowCount();
				while ($persona= $stmt->fetchObject() ) 
				{
					/*echo "<li>{$persona->id_usuario}</li>";
					echo "<li>{$persona->nombre}</li>";
					echo "<li>{$persona->a_paterno}</li>";
					echo "<li>{$persona->a_materno}</li>";
					echo "<li>{$persona->tipo}</li>";
					echo "<li>{$persona->correo}</li>";
					echo "<li>{$persona->sexo}</li>";
					echo "<li>{$persona->fecha_nacimiento}</li>";
					echo "<li>{$persona->imagen}</li>";
					echo "<li>{$persona->nick}</li>";
					echo "<li>{$persona->password}</li>";
					echo "<br>";*//*

					$usuario=$persona;
					$usuario->id_usuario=$persona->id_usuario;
					$usuario->nombre=$persona->nombre;
					$usuario->paterno=$persona->a_paterno;
					$usuario->materno=$persona->a_materno;
					$usuario->tipo=$persona->tipo;
					$usuario->correo=$persona->correo;
					$usuario->sexo=$persona->sexo;
					$usuario->fecha_nacimiento=$persona->fecha_nacimiento;
					$usuario->imagen=$persona->imagen;
					$usuario->nick=$persona->nick;
					$usuario->contraseña=$persona->password;

					echo $usuario->id_usuario, " ", $usuario->nombre, " ", $usuario->paterno, " ", $usuario->nick, " ", $usuario->contraseña;
					//return $usuario
					
				} */

				include('../Conexion/conexion.php');
				$sql="SELECT usuario.id_usuario, usuario.nombre, usuario.a_paterno, usuario.a_materno, usuario.tipo, usuario.correo, usuario.sexo, usuario.fecha_nacimiento, usuario.imagen, login.nick, login.password FROM usuario inner join login on usuario.id_usuario=login.id_usuario WHERE usuario.id_usuario='$this->id'";
				$datos=$conexion->query($sql);
				session_start();
				foreach ($datos as $resultado) 
				{
					$_SESSION["id_usuario"]=$resultado['id_usuario'];
					$_SESSION["nombre"]=$resultado['nombre'];
					$_SESSION["paterno"]=$resultado['a_paterno'];
					$_SESSION["materno"]=$resultado['a_materno'];
					$_SESSION["tipo"]=$resultado['tipo'];
					$_SESSION["correo"]=$resultado['correo'];
					$_SESSION["sexo"]=$resultado['sexo'];
					$_SESSION["nacimiento"]=$resultado['fecha_nacimiento'];
					$_SESSION["imagen"]=$resultado['imagen'];
					$_SESSION["nick"]=$resultado['nick'];
					$_SESSION["password"]=$resultado['password'];
				}
				$conexion=null;
		}

	function login()
	{
			require_once('../Conexion/conexion.php');
			$sql= "SELECT l.nick, l.password, u.id_usuario, u.tipo FROM usuario as u inner join login as l on u.id_usuario=l.id_usuario WHERE nick='$this->nick'";
			$datos=$conexion->query($sql);
		
			$nickUsuario="";
			$passUsuario="";
			foreach ($datos as $resultado) 
			{
				$nickUsuario= $resultado['nick'];
				$passUsuario= $resultado['password'];
				$idUsuario=$resultado['id_usuario'];
				$tipoUsuario=$resultado['tipo'];
			}

			if($nickUsuario==$this->nick and $passUsuario==$this->password)
			{
				//Pasamos el id y tipo del usuario
				$this->id= $idUsuario;
				$this->tipo=$tipoUsuario;
				$this->datos();//Creamosvariables de sesion

				$sql="UPDATE login SET fecha=current_timestamp WHERE id_usuario='$this->id' ";
				$datos=$conexion->prepare($sql);
				$datos->execute();

			
				if($this->tipo=='1')
					echo  '<script type="text/javascript"> alert("¡Bienvenido Administrador!");</script>';//Imprime un alerta
				elseif($this->tipo=='0')
					echo  '<script type="text/javascript"> alert("¡Bienvenido Usuario!");</script>';//Imprime un alerta
				
			
				header("location: ../ia.php?invitado=0");
			}
			else
			{
				if($this->nick != $nickUsuario)
				{
				    echo  '<script type="text/javascript"> alert("Fallo al iniciar sesion, el nombre de usuario es incorrecto");</script>'; //Imprime un alerta
				}

				elseif ($this->password != $passUsuario) 
				{
					echo  '<script type="text/javascript"> alert("Fallo al iniciar sesion, la contraseña es incorrecta");</script>'; //Imprime un alerta
				}
				echo '<script type="text/javascript"> document.location = "../../index.html"; </script>';//se redirecciona
			}
			$conexion= null;
	}
}

$usuario= new usuario;
$usuario->asignacion();
$usuario->login();
?>