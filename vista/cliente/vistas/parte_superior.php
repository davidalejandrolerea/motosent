<?php
/*
session_start();
require ("validacion_login/conexion.php");
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}
$idUsuario = $_SESSION['user_id'];
$sql = "SELECT ID_USUARIO, NOMBRE_USUARIO FROM usuario WHERE ID_USUARIO = '$idUsuario' ";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();*/
require('validacion_login/conexion.php');

$usuario='root';
$contraseña='';
$host='localhost';
$base='moto_sent_fsa';

try {
      $conexion = new PDO('mysql:host='.$host.';dbname='.$base, $usuario, $contraseña);
  } 
  catch (PDOException $e) 
  {
      print "¡Error!: " . $e->getMessage() . "<br/>";
      die();
  }







session_start();

$mensaje = null;
$id_usu = null;
$nombre_usu = null;
$consulta = null;


if(isset($_SESSION['usuario'])){

	if($_SESSION['usuario']['RELA_TIPO_USUARIO']=="2"){
        $mensaje = "usuario";
        $id_usu = $_SESSION['usuario']['id_usuario'];
        $nombre_usu=  $_SESSION['usuario']['nombre_usuario'];
        $nombre_per=  $_SESSION['usuario']['nombre_pers'];
        $id_cliente= $_SESSION['usuario']['id_cliente'];
        $apellido= $_SESSION['usuario']['apellido'];
         $contraseña= $_SESSION['usuario']['pass'];
         $email= $_SESSION['usuario']['email'];
         
        
    }
} 
else 
{
    print "<script>alert(\"Acceso invalido!\");window.location='index.php';</script>";
}  




$consulta = "SELECT id_oferta, ID_PEDIDO,  monto_oferta, fecha_inicio, duracion_oferta, situacion_oferta, nombre_empresa, descripcion_ped, id_pedido
from  oferta_pedido , pedido, cliente, empresa where rela_empresa= id_empresa and rela_cliente=id_cliente and rela_pedido=id_pedido and id_cliente= '".$id_cliente."'  ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CLIENTE- MOTOSENT-FSA</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./home.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MOTOSENT-FSA CLIENTE <sup>0.5</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Historial</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        ACCIONES
      </div>

      

     


     

  

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="./contacto.php">
          <i class="fas fa-fw fa-inbox"></i>
          <span>Contacto</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="oferta.php">
          <i class="fas fa-bullhorn"></i>
          <span>Ofertas</span></a>
      </li>





      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop"  class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#"  id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <?php 
                      require('controlador/conexion.php');

                      $mensaje=$conexion->query("SELECT id_oferta, ID_PEDIDO,  monto_oferta, duracion_oferta, situacion_oferta, nombre_empresa, descripcion_ped, id_pedido
                      from  oferta_pedido , pedido, cliente, empresa 
                      where rela_empresa= id_empresa and rela_cliente=id_cliente and rela_pedido=id_pedido and id_cliente= '".$id_cliente."'  ");
                      $mensaje->execute();
                      $mensaje_disponible= $mensaje->rowCount();
                      echo '<span class="badge badge-danger badge-counter">'.$mensaje_disponible.'+</span>';          
              ?>   
              </a>
              <!-- Dropdown - Alerts -->
              <div onclick="myFunction()" class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  CENTRO DE NOTIFICACIONES
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="oferta.php">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <?php                            
                            foreach($data as $dat) {                                                        
                            ?>

                    <div class="small text-gray-500"><?php echo $dat['fecha_inicio']; ?></div>
                    <span class="font-weight-bold"> <?php echo $dat['nombre_empresa']; ?></span>
                    <br>
                    <span class="font-weight-bold"> <?php echo $dat['descripcion_ped']; ?><?php } ?></span>
                  </div>
                </a>
            </li>

            
             
                  
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
           <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <?php
               echo' <span class="mr-2 d-none d-lg-inline text-gray-600 small">'.$nombre_per.' '.$apellido.' </span>';
                ?>
                      <!--<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">-->
                <img class="img-profile rounded-circle" src="img/user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="perfil.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfiles
                </a>
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>
              </div>
            </li>

          </ul>

        </nav>

        

        <!-- End of Topbar -->


      <script type="text/javascript">
      function myFunction() {
        $.ajax({
          url: "notificaciones.php",
          type: "POST",
          processData:false,
          success: function(data){
            $("#notification-count").remove();                  
            $("#notification-latest").show();$("#notification-latest").html(data);
          },
          error: function(){}           
        });
      }
                                 
      $(document).ready(function() {
        $('body').click(function(e){
          if ( e.target.id != 'notification-icon'){
            $("#notification-latest").hide();
          }
        });
      });                                     
    </script>