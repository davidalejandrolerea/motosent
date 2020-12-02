<?php 

if(!empty($_GET)){
			include "conexion.php";
			$objeto = new Conexion();
$conexion = $objeto->Conectar();
                
			 $pedido_acep = "UPDATE pedido SET estado= 'ACEP' WHERE id_pedido=".$_GET["id_pedido"];
			 $query = $conexion->query($pedido_acep);

			$sql = "UPDATE oferta_pedido SET situacion_oferta= 'Aceptado' WHERE id_oferta=".$_GET["id_oferta"];
			$query = $conexion->query($sql);

			if($query!=null){
				print "<script>alert(\"Oferta Aceptada.\");window.location='../oferta.php';</script>";
			}else{
				print "<script>alert(\"ERROR.\");window.location='../oferta.php';</script>";

			}
}




/*echo'<script type="text/javascript">
    alert("INGRESANDO A WHATSAPP");
    window.location.href="https://api.whatsapp.com/send?phone=5493704641201&text=Hola,%20Me%20interesa%20la%20Oferta";
    </script>'; */


 ?>