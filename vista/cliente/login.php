<?php

if(!empty($_POST)){
	if(isset($_POST["usuario"]) &&isset($_POST["contraseña"])){
		if($_POST["usuario"]!=""&&$_POST["contraseña"]!=""){
		
			/*$user_id=null;
			$sql1= "select * from usuario where (NOMBRE_USUARIO=\"$_POST[usuario]\" or EMAIL=\"$_POST[usuario]\") and PASS=\"$_POST[contraseña]\" RELA_TIPO_USUARIO= ";
			$query = $mysqli->query($sql1);

			while ($r=$query->fetch_array()) {
				$user_id=$r["ID_USUARIO"];
				break;
			}

			if($user_id==null){
				print "<script>alert(\"Acceso invalido.\");window.location='index.php';</script>";
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
				print "<script>window.location='home.php';</script>";				
			}*/

          
        
             //id_usuario, NOMBRE,
			 include "validacion_login/conexion.php";
			 sleep(2);
			 session_start();
			 $usu=$_POST['usuario'];
			 $pass=$_POST['contraseña'];
			$usuarios = $mysqli->query("select id_usuario, id_cliente, email, nombre_usuario, pass, RELA_TIPO_USUARIO, nombre_pers, apellido
			 from usuario, cliente, persona 
			 where EMAIL = '".$usu."' or NOMBRE_USUARIO ='".$usu."' and PASS ='".$pass."'
			 and rela_tipo_usuario= 2 and rela_usuario=id_usuario and rela_persona=id_persona ");

			if ($usuarios->num_rows == 1):
				$datos = $usuarios->fetch_assoc();
				$_SESSION['usuario'] = $datos;
				print "<script>window.location='home.php';</script>";	
			else:
				print "<script>alert(\"Usuario Inexistente.\");window.location='index.php';</script>";
			endif;

			$mysqli->close();


		}
	}
}



?>