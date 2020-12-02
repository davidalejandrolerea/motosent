<?php

	require('conexion.php');
	sleep(2);
    session_start();
	$usu=$_POST['usuario'];
    $pass=$_POST['contraseña'];

    //id_usuario, NOMBRE,

	$usuarios = $mysqli->query("Select id_usuario, nombre, NOMBRE_USUARIO, PASS, rela_usuario, RELA_TIPO_USUARIO From usuario, empresa
    Where NOMBRE_USUARIO = '".$usu."' AND PASS = '".$pass."' and  RELA_Usuario = ID_usuario");

	if ($usuarios->num_rows == 1):
		$datos = $usuarios->fetch_assoc();
		$_SESSION['usuario'] = $datos;
		echo json_encode(array('error'=>false,'tipo_usuario'=>$datos['RELA_TIPO_USUARIO']));
	else:
		echo json_encode(array('error'=>true));
	endif;


	

	$mysqli->close();

?>
