<?php
	session_start();
	session_unset();//libera todas las variables de sesion
	session_destroy();//destruye toda la informacion registrada en una sesion
	session_write_close();//Utiliza para escribir los datos de sesion y finalizar la sesion
	setcookie(session_name(), ' ', 0, '/');
	session_regenerate_id(true);
	Header("HTTP/1.1 301 Moved Permanently");
?>
	<meta http-equiv="refresh" content="0; url=../index.html">
