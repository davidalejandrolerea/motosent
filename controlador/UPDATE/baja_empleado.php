
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

$id=$_GET['id_empleado'];
echo $id;

$estado_empleado=$conexion->query(" update  empleado set ESTADO = 'no' 
Where id_empleados = '".$id."'");
$estado_empleado->execute();

header('Location: ../../vista/empresa/tabla_empleado.php');






?>