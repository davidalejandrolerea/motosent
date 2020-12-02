
<?php
session_start();

$mensaje = null;
$nombre = null;

if(isset($_SESSION['usuario'])){
	if($_SESSION['usuario']['RELA_TIPO_USUARIO']=="1"){
        $mensaje = "Empresa";
        $nombre = $_SESSION['usuario']['nombre_empresa'];
        $empresa = $_SESSION['usuario']['id_empresa'];
    }
} else {

    header('Location: ../index.php');

}  

include ("../conexion.php");

$id=$_GET['id_oferta'];


$estado_empleado=$conexion->query(" DELETE FROM oferta_pedido WHERE id_oferta='".$id."'");
$estado_empleado->execute();

header('Location: ../../vista/empresa/prueba.php');






?>