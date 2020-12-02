<?php
//conexion con la bese de datos
require('../conexion.php');
sleep(2);
//recibimos todos los datos del formulario registro cliente y almacenamos en una variable
$nombre_cliente=$_POST['nombre_cliente'];
$apellido_cliente=$_POST['apellido_cliente'];
$documento_cliente=$_POST['documento_cliente'];
$correo_cliente=$_POST['correo_cliente'];
$localidad_cliente=$_POST['localidad_cliente'];
$direccion_cliente=$_POST['direccion_cliente'];
$usuario_cliente=$_POST['usuario_cliente'];
$contraseña=$_POST['contraseña_cliente'];
$validar_contraseña=$_POST['validar_contraseña'];
$fecha_cliente=date("Y-m-d", strtotime($_POST['fecha_cliente']));
$localidad_cliente=$_POST['localidad_cliente'];
$tipo_celular=$_POST['tipo_celular'];
$telefono_cliente=$_POST['telefono_cliente'];


 




if ($contraseña != $validar_contraseña ) {
    header("location: ../../registrar_cliente.php?mensaje=2"); 
    echo "la contraseña no coincide";
} else if ($contraseña == $validar_contraseña) 




{
   //cunsultamos en la base de datos si el email ya existe en la base de datos.
     $correo_existe=$conexion->query(" Select NOMBRE_USUARIO From usuario  
     Where NOMBRE_USUARIO = '".$usuario_cliente."'");
     $correo_existe->execute();
    if ( $correo_existe->rowCount() >= 1 ) //rowCount(). Devuelve el número de filas afectadas por la última sentencia SQL
      {
        
        echo'<script type="text/javascript">
    alert("El email o Usuario en uso");
    window.location.href="../../registrar_cliente.php?mensaje=1";
    </script>';

        
      } elseif ($correo_existe->rowCount() == 0) {
         //verificamos en la base de datos si el usuario ya existe
          $usuario_existe=$conexion->query(" Select EMAIL From usuario  
          Where EMAIL = '".$correo_cliente."'");
          $usuario_existe->execute();
         if ( $usuario_existe->rowCount() >= 1 ) 
         {
            header("location: ../../registrar_cliente.php?mensaje=3"); 
            echo "el email ya esta en uso";
         } elseif ( $usuario_existe->rowCount() == 0 ) {

     
        //registramos el cliente en la base de datos
        $sql1="INSERT INTO persona(NOMBRE_pers, APELLIDO, DNI, FECHA_NAC)
        VALUES('$nombre_cliente', '$apellido_cliente', '$documento_cliente','$fecha_cliente')";
         $conexion->exec($sql1);
        $lastInsertId2=$conexion->lastInsertId();//Aca guardamos en otra variable el ID donde se guardo los datos personales del cliente
        //cargamos la tabla telefono con lo ingresado en el formulario
        $sql4="INSERT INTO telefono(NUMERO, RELA_PERSONA, RELA_TIPO_TEL)
        VALUES('$telefono_cliente', '$lastInsertId2', '$tipo_celular')";
        $conexion->exec($sql4);

        //guardamos el usuario y contraseña del cliente en la tabla usuario
        $sql2="INSERT INTO usuario(NOMBRE_USUARIO, EMAIL, PASS, FOTO, RELA_TIPO_USUARIO)
        VALUES('$usuario_cliente', '$correo_cliente', '$contraseña', '$nombre', 2)";
        $conexion->exec($sql2);
        $lastInsertId=$conexion->lastInsertId();//GUARDAMOS EN UN VARIABLE EL ID donde se guardo el usu y 
        // relacionamos la tabla usuario, persona con la tabla cliente
        $sql3="INSERT INTO cliente(RELA_PERSONA, RELA_USUARIO)
        VALUES('$lastInsertId2', '$lastInsertId')";
        $conexion->exec($sql3);

        

         $sql5="INSERT INTO localidad(NOMBRE_LOC, RELA_PROVINCIA)
        VALUES('$localidad_cliente', 1)";
        $conexion->exec($sql5);
        $lastInsertId3=$conexion->lastInsertId();

        $sql6="INSERT INTO direccion(DESCRIPCION_DIR, RELA_LOCALIDAD, RELA_PERSONA)
        VALUES ('$direccion_cliente', '$lastInsertId3', '$lastInsertId2')";
        $conexion->exec($sql6);



        //si se registra correctamente el cliente nos manda en la pantalla de inicio.
        echo'<script type="text/javascript">
    alert("Usuario Registrado");
    window.location.href="../../index.php";
    </script>';
}

}
 }
?>