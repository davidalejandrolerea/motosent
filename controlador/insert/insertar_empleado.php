<?php
session_start();

$mensaje = null;
$nombre = null;

if(isset($_SESSION['usuario'])){
	if($_SESSION['usuario']['RELA_TIPO_USUARIO']=="1"){
        $mensaje = "Empresa";
        $nombre = $_SESSION['usuario']['nombre'];
        $empresa = $_SESSION['usuario']['id_empresa'];
    }
} else {

    header('Location: ../../index.php');

}  




//conexion con la bese de datos
require('../conexion.php');
sleep(2);
//recibimos todos los datos del formulario registro de empleado y almacenamos en una variable
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$DNI_per=$_POST['DNI_per'];
$fecha_nac=$_POST['fecha_nac'];
$patente=$_POST['patente'];
$descri_vehiculo=$_POST['descri_vehiculo'];
$puesto=$_POST['RELA_PUESTO_TRABAJO'];
$localidad=$_POST['RELA_LOCALIDAD'];
$tipo_telefono=$_POST['RELA_TIPO_TELEFONO'];
$direccion=$_POST['direccion'];
$foto=$_POST['foto_empleado'];
$telefono=$_POST['telefono'];





//insertamos empleado
$sql="INSERT INTO persona(nombre_pers, APELLIDO, DNI, FECHA_NAC)
VALUES('$nombre', '$apellido', '$DNI_per', '$fecha_nac')";
$conexion->exec($sql);
$lastInsertId=$conexion->lastInsertId();//Este método devuelve el id autoincrementado del último registro en esa conexión

//insertamos telefono del empleado
$sql1="INSERT INTO telefono( NUMERO, RELA_PERSONA, RELA_TIPO_TEL)
VALUES('$telefono', '$lastInsertId', '$tipo_telefono' )";
$conexion->exec($sql1);

//insertamos los datos del empleado: tipo de puesto, en que empresa trabaja
$sql2="INSERT INTO empleado(PATENTE, DESCRIPCION_VEHICULO, foto_empleado, RELA_PERSONA, RELA_EMPRESA, RELA_PUESTO_TRABAJO, ESTADO, estado_disp_ocu)
VALUES('$patente', '$descri_vehiculo', '$foto', '$lastInsertId', '$empresa', '$puesto', 'si', 'Disponible')";
$conexion->exec($sql2);

//insertar direccion empleado
$sql3="INSERT INTO direccion(DESCRIPCION, RELA_LOCALIDAD, RELA_PERSONA)
VALUES('$direccion', '$localidad', '$lastInsertId')";
$conexion->exec($sql3);



//si se registra correctamente la empresa nos manda en la pantalla de inicio.
header('Location: ../../vista/empresa/tabla_empleado.php?exito=true');
echo 'se ha registrado correctamente';

?>


