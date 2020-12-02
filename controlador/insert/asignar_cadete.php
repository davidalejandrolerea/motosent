<?php

//conexion con la bese de datos
require('../conexion.php');
sleep(2);
//recibimos todos los datos del formulario registro de empleado y almacenamos en una variable
$id_oferta=$_POST['id_oferta'];
$id_empleado_cadete=$_POST['RELA_EMPLEADO'];

echo $id_oferta;
echo $id_empleado_cadete;




/*
//insertamos empleado
$sql="INSERT INTO detalle_pedido(rela_oferta_pedido, rela_empleado, estado_pedido)
VALUES($id_oferta, $id_empleado_cadete, 'enproceso')";
$conexion->exec($sql);*/
//asigna un cadete al al cliente 
$estado_empleado=$conexion->query(" update  oferta_pedido set rela_empleado ='".$id_empleado_cadete."', situacion_oferta=  'Enproceso' where id_oferta='".$id_oferta."'");
$estado_empleado->execute();

// cambia el estado del cadete a ocupado
$estado_empleado=$conexion->query(" update  empleado set estado_disp_ocu = 'Ocupado' 
Where id_empleados = '".$id_empleado_cadete."'");
$estado_empleado->execute();


//si se registra correctamente la empresa nos manda en la pantalla de inicio.
header('Location: ../../vista/empresa/pedido_confirmado.php?exito=true');
echo 'se ha registrado correctamente';

?>