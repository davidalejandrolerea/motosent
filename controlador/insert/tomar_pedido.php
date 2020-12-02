<?php
session_start();

$mensaje = null;
$nombre = null;

if(isset($_SESSION['usuario'])){
	if($_SESSION['usuario']['RELA_TIPO_USUARIO']=="1"){
        $mensaje = "Empresa";
        $nombre = $_SESSION['usuario']['nombre_empresa'];
        $id_empresa = $_SESSION['usuario']['id_empresa'];
    }
} else {

    header('Location: ../../index.php');

}  




//conexion con la bese de datos
require('../conexion.php');
sleep(2);
//recibimos todos los datos del formulario registro de empleado y almacenamos en una variable
$id_ped=$_POST['id_pedido'];
$monto_pedido=$_POST['monto'];
$duracion_pedido=$_POST['duracion'];

//insertamos oferta pedido
$sql="INSERT INTO oferta_pedido(monto_oferta, duracion_oferta, rela_empresa, rela_pedido, situacion_oferta)
VALUES('$monto_pedido', '$duracion_pedido', $id_empresa, $id_ped, 'ACTIVO')";
$conexion->exec($sql);




//si se registra correctamente la empresa nos manda en la pantalla de inicio.
/*echo'<script type="text/javascript">
    alert("Oferta enviada");
    window.location.href="../../vista/empresa/pedido_disponible.php";
    </script>';*/

header('Location: ../../vista/empresa/pedido_disponible.php?oferta=1');

//echo 'se ha registrado correctamente';

?>


