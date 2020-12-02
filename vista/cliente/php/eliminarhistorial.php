<?php 
	if(!empty($_GET)){
			include "conexion.php";
			$objeto = new Conexion();
$conexion = $objeto->Conectar();
			
			$sql = "DELETE FROM pedido WHERE ID_PEDIDO=".$_GET["ID_PEDIDO"];
			$query = $conexion->query($sql);
			if($query!=null){
				print "<script>alert(\" Pedido Eliminado exitosamente.\");window.location='../home.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar Pedido.\");window.location='../home.php';</script>";

			}
}
 ?>