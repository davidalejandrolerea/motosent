<?php 
session_start();
$mensaje = null;
$id_usu = null;
$nombre_usu = null;
if(isset($_SESSION['usuario'])){

	if($_SESSION['usuario']['RELA_TIPO_USUARIO']=="2"){
        $mensaje = "usuario";
        $id_usu = $_SESSION['usuario']['id_usuario'];
        $nombre_usu=  $_SESSION['usuario']['nombre_usuario'];
        $nombre_per=  $_SESSION['usuario']['nombre_pers'];
        $id_cliente= $_SESSION['usuario']['id_cliente'];
        $apellido= $_SESSION['usuario']['apellido'];
    }
} 
else 
{
    print "<script>alert(\"Acceso invalido!\");window.location='index.php';</script>";
}  

//conexion con la bese de datos
require('../conexion.php');
sleep(2);
//recibimos todos los datos del formulario de carga de pedido y almacenamos en una variable
$pedido_cliente=$_POST['pedido_cliente'];
$direccion_cliente=$_POST['direccion_cliente'];
$fechainicio = date( 'Y-m-d' ); //esta fecha seria la que inicia el pedido
$fechafinal = date( 'Y-m-d' ); //esta fecha seria el final del pedido



//registramos el pedido en la base de datos

        $sql1="INSERT INTO pedido(FECHA_INICIO, FECHA_FIN, DESCRIPCION_PED, direccion_ped, RELA_CLIENTE, ESTADO)
        VALUES('$fechainicio', '$fechafinal', '$pedido_cliente','$direccion_cliente', $id_cliente, 'Activo')";
         $conexion->exec($sql1);

   //si se registra correctamente el pedido nos manda en la pantalla de inicio.
        
        echo 'se ha registrado correctamente';
        header("location: ../../home.php"); 

 ?>