<?php
echo "hola"; exit();
function connect(){
	$bd = null;
	$DBHost  = "127.0.0.1";  // Nombre del servidor de bases de datos
	$DBUser  = "root";       // Nombre del usuario
	$DBPasw  = "";          // Contraseña
	$DBName  = "store";     // Nombre de la base de datos
	
	try{
		$bd = new PDO('mysql:host='$DBHost.';dbname='. $DBName , $DBUser , $DBPasw );
	}catch( PDOExeption $e ){
			echo "Error de conexion." . $e ;
			exit;
	}
	
	return $bd;
}
?>