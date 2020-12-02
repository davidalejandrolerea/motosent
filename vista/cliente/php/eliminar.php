<?php

if(!empty($_GET)){
			include "conexion.php";
			$objeto = new Conexion();
$conexion = $objeto->Conectar();
			
			$sql = "DELETE FROM oferta_pedido WHERE id_oferta=".$_GET["id_oferta"];
			$query = $conexion->query($sql);
			if($query!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='../oferta.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='../oferta.php';</script>";

			}
}

?>