<?php 
require ('conexion.php');

$sql1="TRUNCATE TABLE pedido";
         $conexion->exec($sql1);
/*echo'<script type="text/javascript">
    alert("PEDIDOS ELIMINADOS");
    window.location.href="../home.php";
    </script>';*/

 ?>