<?php
function Connect(){
	$conn = null;
	$DBHost  = "127.0.0.1";  // Nombre del servidor de bases de datos
	$DBName  = "store";     // Nombre de la base de datos
	$DBUser  = "root";       // Nombre del usuario
	$DBPasw  = "";          // Contraseña
	try{
		$conn = new PDO('mysql:host='.$DBHost.';dbname='. $DBName , $DBUser , $DBPasw );
	}catch( PDOException $e ){
			echo "Error de conexion." . $e ;
			exit;
	}
	return $conn;
}
	
?>