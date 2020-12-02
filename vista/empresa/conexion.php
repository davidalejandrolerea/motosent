<?php 

		// Conexion  a la base de datos 
$scon = "mysql:dbname=moto_sent_fsa;host=localhost";
$suser ='root';
$spass ='';
$msg='';



try {
	$pdo = new PDO($scon,$suser,$spass,array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	"conexion_ok";
} catch (PDOException $e) {

	"Error al conectar a la base de datos. ".$e->getMessage();	

}

				 ?>