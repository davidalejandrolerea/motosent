<?php 

		// Conexion  a la base de datos 

try {

	$user = "root";
	$pass = "";
	$host = "localhost";//Solo si es el localhost
	$db = "moto_sent_fsa";
	$conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
	return $conexion;

} catch (Exception $e) {

	return $e->getMessage(); 

}	

?>