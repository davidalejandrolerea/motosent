<?php
//conexion con la bese de datos
require('../conexion.php');
sleep(2);
//recibimos todos los datos del formulario registro empresa y almacenamos en una variable
$nombre_empresa=$_POST['nombre_empresa'];
$cuit_empresa=$_POST['cuit_empresa'];
$correo_empresa=$_POST['correo_empresa'];
$telefono_empresa=$_POST['telefono_empresa'];
$direccion_empresa=$_POST['direccion_empresa'];
$usuario_empresa=$_POST['usuario_empresa'];
$contraseña=$_POST['contraseña'];
$validar_contraseña=$_POST['validar_contraseña'];

 


if ($contraseña != $validar_contraseña ) {
    header("location: ../../registrar_empresa.php?mensaje=2"); 
    echo "la contraseña no coincide";
} else if ($contraseña == $validar_contraseña) 
{
   //cunsultamos en la base de datos si el email ya existe en la base de datos.
     $correo_existe=$conexion->query(" Select NOMBRE_USUARIO From usuario  
     Where NOMBRE_USUARIO = '".$usuario_empresa."'");
     $correo_existe->execute();
    if ( $correo_existe->rowCount() >= 1 ) //rowCount(). Devuelve el número de filas afectadas por la última sentencia SQL
      {
        header("location: ../../registrar_empresa.php?mensaje=1"); 
        echo "el email ya esta en uso";
      } elseif ($correo_existe->rowCount() == 0) {
         //verificamos en la base de datos si el usuario ya existe
          $usuario_existe=$conexion->query(" Select EMAIL From usuario  
          Where EMAIL = '".$correo_empresa."'");
          $usuario_existe->execute();
         if ( $usuario_existe->rowCount() >= 1 ) 
         {
            header("location: ../../registrar_empresa.php?mensaje=3"); 
            echo "el email ya esta en uso";
         } elseif ( $usuario_existe->rowCount() == 0 ) {

           //guardamos el usuario y contraseña de la empresa en la tabla usuario
        $sql="INSERT INTO usuario(NOMBRE_USUARIO, EMAIL, PASS, RELA_TIPO_USUARIO)
        VALUES('$usuario_empresa', '$correo_empresa', '$contraseña', 1)";
        $conexion->exec($sql);
        $lastInsertId=$conexion->lastInsertId();//Este método devuelve el id autoincrementado del último registro en esa conexión.
        //registramo la empresa en la base de datos
        $sql="INSERT INTO empresa(nombre_empresa, CUIL_CUIT, Telefono, Direccion, RELA_USUARIO)
        VALUES('$nombre_empresa', '$cuit_empresa', '$telefono_empresa', '$direccion_empresa', '$lastInsertId')";
        $conexion->exec($sql);
        //si se registra correctamente la empresa nos manda en la pantalla de inicio.
        header("location: ../../index.php?mensaje=2"); 
        echo 'se ha registrado correctamente';

         }
      }
  }
  
?>