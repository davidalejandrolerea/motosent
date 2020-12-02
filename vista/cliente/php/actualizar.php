
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php

if(!empty($_POST)){
	if(isset($_POST["nombre_usu"]) &&isset($_POST["contraseña"]) &&isset($_POST["email"])){
		if($_POST["nombre_usu"]!=""&& $_POST["contraseña"]!=""&&$_POST["email"]!=""){
			include "conexion.php";
			$objeto = new Conexion();
            $conexion = $objeto->Conectar();
			
			$sql = "update usuario set nombre_usuario=\"$_POST[nombre_usu]\",pass=\"$_POST[contraseña]\",email=\"$_POST[email]\" where id_usuario=".$_POST["id_usuario"];
			$query = $conexion->query($sql);
			if($query!=null){
				 swal ( " Se ha Actualizado Correctamente " ) ;
        header("location: ../../home.php"); 
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../perfil.php';</script>";

			}
		}
	}
}


?>

