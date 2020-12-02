

<?php
require('../../validacion_login/conexion.php');
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

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MOTOSENT FSA</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../css/mensaje.css">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">



    <!-- Page Wrapper  <sup>2</sup>-->
    <div id="wrapper">
        <!-- Sidebar -->
        
        <!-- Menu -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <?php
             if(isset($_SESSION['usuario'])){
              if($_SESSION['usuario']['RELA_TIPO_USUARIO']=="1"){

                echo ' 
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="inicio_empresa.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">MOTOSENT FSA </div>
                 
                </a>';
               
                //<div class="sidebar-brand-text mx-3">'.$nombre.' </div> 
               
                  echo '

                  <hr class="sidebar-divider my-0">
             
                    <li class="nav-item active">
                        <a class="nav-link" href="inicio_empresa.php">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Inicio</span></a>
                    </li>
                    <hr class="sidebar-divider">
                    <div class="sidebar-heading">
                        EMPLEADO
                    </div>
        
                    <li class="nav-item">

                    <a class="nav-link" href="tabla_empleado.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Empleados</span></a>
                    </li>

                   
                
                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div> ';
              }
             }
            ?>
        </ul>
        <!-- Fin de Menu -->






        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                      <i class="fa fa-bars"></i>
                      </button>
                      
                      <?php 
                                              require('conexion.php');

                                              $cadete_disponible=$pdo->query("SELECT id_empleados, nombre_pers FROM empleado, persona, empresa, puesto
                                              where rela_persona=id_persona and rela_empresa=id_empresa and RELA_PUESTO_TRABAJO=id_puesto and estado='si' and  id_empresa= '".$id_empresa."' and estado_disp_ocu='Disponible' and RELA_PUESTO_TRABAJO= 2 ");
                                              $cadete_disponible->execute();
                                              $cadete_dis= $cadete_disponible->rowCount();
                                              echo '<h1 class="h5 mb-0 font-weight-bold text-gray-800">Cadete disponible: '.$cadete_dis.' </h1>';
                                            
                                           
                                           
                                            ?>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                         <!-- Notificacion -->
                         <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>

                                <?php 
                                              require('conexion.php');

                                              $correo_existe=$pdo->query("SELECT id_oferta, ID_PEDIDO, nombre_pers, apellido, direccion_ped, descripcion_ped,  monto_oferta, duracion_oferta, nombre_empresa, situacion_oferta
                                              FROM oferta_pedido, persona, pedido, empresa, cliente
                                             WHERE rela_persona=id_persona and rela_cliente=id_cliente and rela_pedido=id_pedido
                                             and  rela_empresa=id_empresa and situacion_oferta='Aceptado' and id_empresa= '".$id_empresa."' ");
                                              $correo_existe->execute();
                                              $pedido_disponible= $correo_existe->rowCount();
                                              echo '<span class="badge badge-danger badge-counter">'.$pedido_disponible.'+</span>';          
                                ?>                             
                            </a>
                            <!-- Notificaciones  de mensaje confirmado-->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                Notificaciones
                                </h6>
                                    <?php 
                                    //CONEXION A LA BASE DE DATOS
                                    include ("conexion.php");
                                    //SELECCIONAMOS LO DE SE VA A IMPRIMIR
                                    $sql=$pdo->query("SELECT id_oferta, ID_PEDIDO, nombre_pers, fecha_inicio, apellido, direccion_ped, descripcion_ped,  monto_oferta, duracion_oferta, nombre_empresa, situacion_oferta
                                    FROM oferta_pedido, persona, pedido, empresa, cliente
                                   WHERE rela_persona=id_persona and rela_cliente=id_cliente and rela_pedido=id_pedido
                                   and  rela_empresa=id_empresa and situacion_oferta='Aceptado' and id_empresa= '".$id_empresa."' ")->fetchAll(PDO::FETCH_CLASS) 
                                    ?> 

                                
                                        <?php foreach ($sql as $fila): ?>  
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="mr-3">
                                                    <div class="icon-circle bg-primary">
                                                        <i class="fas fa-file-alt text-white"></i>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="small text-gray-500"><?php 
                                                    echo $fila->nombre_pers.' ';
                                                    echo $fila->apellido;
                                                    echo $fila->fecha_inicio; ?></div>
                                                    <span class="font-weight-bold"><?php $id_ped= $fila->id_oferta; 
                                                    echo $fila->descripcion_ped. ' ';
                                                    echo $fila->direccion_ped;
                                                    ?></span>

                                                </div>
                                          
                                           </a>
                                        <?php endforeach?>

                                
                                <a class="dropdown-item text-center small text-gray-500" href="#">CErrar</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!--perfil -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php 
                                echo '<span class="mr-2 d-none d-lg-inline text-gray-600 small"> '.$nombre.' 
                                </span>';                       
                            ?>
                                <img class="img-profile rounded-circle" src="../cliente/img/user.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>


                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <?php 
                    echo '<h1 class="h3 mb-0 text-gray-800">'.$nombre.'</h1>';
                    ?>
                        
                    </div>

                    <!-- Content Row -->
                    <!-- Content Row -->
                    <div class="row">

                         <!-- Earnings (Monthly) Card Example -->
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                <a href="pedido_disponible.php">
                                <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">PEDIDO DISPONIBLE</div>

                                            <?php 
                                              require('conexion.php');

                                              $correo_existe=$pdo->query("SELECT id_pedido, fecha_inicio, descripcion_ped, direccion_ped, nombre_pers, apellido, estado
                                              FROM pedido, cliente, usuario, persona
                                              where rela_usuario=id_usuario and rela_persona=id_persona and rela_cliente=id_cliente  and estado= 'activo'");
                                              $correo_existe->execute();
                                              $pedido_disponible= $correo_existe->rowCount();
                                              echo '<h1 class="h5 mb-0 font-weight-bold text-gray-800">'.$pedido_disponible.'</h1>';
                                             
                                           
                                            ?>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </a>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <a href="pedido_confirmado.php">         
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">PEDIDO CONFIRMADO</div>
                                            <?php 
                                              require('conexion.php');

                                              $correo_existe=$pdo->query("SELECT id_oferta, ID_PEDIDO, nombre_pers, apellido, direccion_ped, descripcion_ped,  monto_oferta, duracion_oferta, nombre_empresa, situacion_oferta
                                              FROM oferta_pedido, persona, pedido, empresa, cliente
                                             WHERE rela_persona=id_persona and rela_cliente=id_cliente and rela_pedido=id_pedido
                                             and  rela_empresa=id_empresa and situacion_oferta='Aceptado' and id_empresa= '".$id_empresa."' ");
                                              $correo_existe->execute();
                                              $pedido_disponible= $correo_existe->rowCount();
                                              echo '<h1 class="h5 mb-0 font-weight-bold text-gray-800">'.$pedido_disponible.'</h1>';
                                             
                                           
                                            ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300  "></i>
                                        </div>
                                    </div>
                                       </a>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                     <a href="pedido_encurso.php">     
                                     <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">PEDIDO EN CURSO</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                <?php 
                                              require('conexion.php');

                                              $correo_existe=$pdo->query("SELECT id_oferta, nombre_pers, apellido, direccion_ped, descripcion_ped, monto_oferta, duracion_oferta, nombre_empresa, situacion_oferta, rela_empleado 
                                              FROM oferta_pedido, persona, pedido, empresa, cliente 
                                              WHERE rela_persona=id_persona and rela_cliente=id_cliente and rela_pedido=id_pedido and rela_empresa=id_empresa and situacion_oferta='Enproceso' and id_empresa= '".$id_empresa."'");
                                              $correo_existe->execute();
                                              $pedido_disponible= $correo_existe->rowCount();
                                              echo '<h1 class="h5 mb-0 font-weight-bold text-gray-800">'.$pedido_disponible.'</h1>';
                                             
                                           
                                            ?>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>                                    
                                       </a>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                  <a href="historial_pedido.php">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">HISTOTIAL DE PEDIDO</div>
                                            <?php 
                                              require('conexion.php');

                                              $correo_existe=$pdo->query("SELECT id_oferta, nombre_pers, apellido, direccion_ped, descripcion_ped, monto_oferta, duracion_oferta, id_empresa, situacion_oferta, rela_empleado 
                                              FROM oferta_pedido, persona, pedido, empresa, cliente 
                                              WHERE rela_persona=id_persona and rela_cliente=id_cliente and rela_pedido=id_pedido and rela_empresa=id_empresa and situacion_oferta='completado' and id_empresa= '".$id_empresa."'");
                                              $correo_existe->execute();
                                              $pedido_disponible= $correo_existe->rowCount();
                                              echo '<h1 class="h5 mb-0 font-weight-bold text-gray-800">'.$pedido_disponible.'</h1>';
                                             
                                           
                                            ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                  </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row -->
                </div>
                <!-- End of Main Content -->

               


                 


       <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <?php
                 echo '<h6 class="m-0 font-weight-bold text-primary">'.$nombre.' PEDIDO DISPONIBLE</h6>';
              ?>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="tablapedido" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NRO</th>
                      <th>Mensaje</th>
                      <th>Fecha Inicio</th>
                      <th>Dirección</th>
                      <th>Usuario</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>


                  <?php 
                 //CONEXION A LA BASE DE DATOS
                include ("conexion.php");
                
                //SELECCIONAMOS LO DE SE VA A IMPRIMIR
                $sql=$pdo->query("SELECT id_pedido, fecha_inicio, descripcion_ped, direccion_ped, nombre_pers, apellido, estado
                FROM pedido, cliente, usuario, persona
                where rela_usuario=id_usuario and rela_persona=id_persona and rela_cliente=id_cliente  and estado= 'activo'")->fetchAll(PDO::FETCH_CLASS) 
                ?> 
                  <tbody>
                  <?php foreach ($sql as $fila): ?>  
                    <tr>  
                    <td><?php echo $fila->id_pedido; ?></td>
                      <td><?php echo $fila->descripcion_ped; ?></td>
                      <td><?php echo $fila->fecha_inicio; ?></td>
                      <td><?php echo $fila->direccion_ped; ?></td>
                      <td><?php echo $fila->nombre_pers.' ' ;
                               echo $fila->apellido; ?></td>
                      <td></td>
                      
                   </tr>
                      <!--SALE DE foreach-->
                  <?php endforeach?>
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->



            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->





        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>



                    <!--TOmar pedido-->
            <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <form id="formPersonas" action="../../controlador/insert/tomar_pedido.php" method="post">    
                        <div class="modal-body">
                            
                            <div class="form-group">
                            <label for="id_pedido" class="col-form-label">Numero de pedido:</label>
                            <input type="number" class="form-control" id="id_pedido" name= "id_pedido" readonly/>
                            </div> 
                            <div class="form-group">
                            <label for="monto" class="col-form-label">Monto:</label>
                            <input type="number" class="form-control" id="monto" name= "monto" required autocomplete="off">
                            </div>  
                            <div class="form-group">
                            <label for="duracion" class="col-form-label">Duracion:</label>
                            <input type="text" class="form-control" id="duracion" name= "duracion" required autocomplete="off"> 
                            </div> 
                            <div class="form-group">
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                        </div>
                    </form>    
                    </div>
                </div>
            </div>  
      




        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="salir.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>



        <script type="text/javascript">
            
                   var oferta = getParameterByName('oferta');
   
                   if (oferta == 1){
   
                       $('.oferta').slideDown('slow');
                      
   
                   }
   
        </script>






        <!-- Bootstrap core JavaScript-->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../../vendor/chart.js/Chart.min.js"></script>
          <!-- tabla_plugin -->
        <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="../../js/demo/datatables-demo.js"></script>

        <!-- Page level custom scripts -->
        <script src="../../js/demo/chart-area-demo.js"></script>
        <script src="../../js/demo/chart-pie-demo.js"></script>
         <!-- ajax para imprimir id cliente -->
        <script type="text/javascript" src="main.js"></script> 
       

</body>

</html>