<?php
require('validacion_login/conexion.php');
session_start();

if(isset($_SESSION['usuario'])){

    if($_SESSION['usuario']['RELA_TIPO_USUARIO']=="1" ){
        header('Location: vista/inicio_empresa.php');       
    } else if( $_SESSION['usuario']['RELA_TIPO_USUARIO']=="2"){
        header('Location: home.php');     
    }
}

    require_once ('validacion_login/conexion.php');

?>







<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MOTSENTFSA_REGISTRO Cliente</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/mensaje.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body class="bg-gradient-primary">

               



    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                
                <div class="row">
                   
                    <div class="span6" align="center">
            <img src="img/motosentico.jpg" width="400" height="100">
        </div>
                   
                    <div class="col-lg-7">
                        <div class="p-5">

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrate para Realizar Pedidos!</h1>
                            </div>

                           <form id="signupform" class="form-horizontal" role="form" action="controlador/insert/registrar_cliente.php" method="POST" autocomplete="off">
                            
                            <div id="signupalert" style="display:none" class="alert alert-danger">
                                <p>Error:</p>
                                <span></span>
                            </div>
                            
                            
                            <div>

                        
                        <div class="form-group">
                                
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nombre_cliente" placeholder="Ingresar Nombre" id="nombre_cliente" required >
                                </div>

                                <br>
                              <div class="form-group">
                               
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="apellido_cliente" placeholder="Ingresar Apellido" id="apellido_cliente" required >
                                </div>
                              <br>

                              <div class="col-md-9">
                                    <input type="text" class="form-control" name="direccion_cliente" placeholder="Ingresar Domicilio" id="direccion_cliente" required >
                                </div>
                              <br>

                                
                               <div class="form-group">
                                
                                <div class="col-md-9">
                                    <input type="number" pattern="[123]{4-8}"  class="form-control" name="documento_cliente" placeholder="Ingresar DNI" id="documento_cliente" required >
                                </div>
                                <br>
                                 <div class="col-md-9">
                                    <label class="label">Fecha de Nacimiento:</label>
                                    <br>
                                    <input type="date"   class="form-control" name="fecha_cliente"  id="fecha_cliente" required >
                                </div>
                               



                             
                             <br>

                                <div class="form-group">
                                
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="correo_cliente" placeholder="Email" id="correo_cliente" required>
                                </div>
                            </div>
                                <br>

                                

                                
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                   
                                   <label  for="label">Localidad:</label>
                                   <br>

                                   <select name="localidad_cliente">
                                   <option value="formosa capital">Formosa Capital</option>
                                   <option value="clorinda">Clorinda</option>
                                   <option value="laishi">Laishi</option>
                                   </select>
                                </div>
                                   
                                   <br>
                               <div class="col-sm-6 mb-3 mb-sm-0">
                                   
                                   <label  for="label">Tipo Telefono:</label>
                                   <br>

                                   <select name="tipo_celular">
                                   <option value="2">Celular</option>
                                   <option value="1">Fijo</option>
                                   
                                   </select>
                                </div>

                                <br>

                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="telefono_cliente" name="telefono_cliente" placeholder="Ingresar Numero de Celular" required autocomplete="off">
                                </div>
                                <br>

                               <div class="form-group">
                                
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="usuario_cliente" placeholder="Usuario" id="usuario_cliente" required>
                                </div>
                            </div>
                            
                            
                                <br>
                               <div class="form-group">
                              
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="contraseña_cliente" placeholder="Contraseña" required>
                                </div>
                            </div>

                                    <br>
                                    <div class="form-group">
                                
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="validar_contraseña" placeholder="Confirmar Contraseña" required>
                                </div>
                            </div>
                                 
                      

                                <br>
                               <center>
                                <div class="form-group">
                                <label for="captcha" class="col-md-3 control-label"></label>
                                <div class="g-recaptcha col-md-9" data-sitekey="6Ldd5vwUAAAAAPWh_rjFFOaWPJy0gnzYzRiJd4hF"></div>
                            </div>
                            <br>
                            </center>
                                <?php
                                /*
                                            if(isset($_GET["falla"]) && $_GET["falla"] == 'true')
                                            {
                                                echo "<div style='color:red'>la contraseña no coincide</div>";
                                                //echo "<script> alert('ha registrado correctamente su empresa'); window.location= 'login.php'</script>";
                                            }*/
                                ?>
                                            <br>


                           

                                <input type="submit" class="btn btn-primary btn-user btn-block" value="REGISTRAR" id="btnSend">

                                <hr>

                            </form>


                            <hr>
                            <div class="text-center">
                                <a class="small" href="Restablecer_contraseña.php">Se te olvidó tu contraseña?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="index.php">¿Ya tienes una cuenta? ¡Iniciar sesión!</a>
                            </div>
                            <div class="text-center">
                                         <a class="small" href="../../index.php">¡Iniciar Sesion como Empresa!</a>
                                    </div>
                            <div class="text-center">
                                         <a class="small" href="../../Registrar_empresa.php">¡Registrar su Empresa!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="js/main.js"></script>
    <script type="text/javascript">
            
         function getParameterByName(name) {
                    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
                    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                    results = regex.exec(location.search);
                    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
         }

                var mensaje = getParameterByName('mensaje');

                if (mensaje == 2){

                    $('.error_agregado').slideDown('slow');
                    setTimeout(function(){
                        $('.error_agregado').slideUp('slow');
                    },10000);

                }else if (mensaje == 1){

                    $('.agregado').slideDown('slow');
                    setTimeout(function(){
                        $('.agregado').slideUp('slow');
                    },10000);

                }else if (mensaje == 3){

                    $('.error_agregado1').slideDown('slow');
                    setTimeout(function(){
                        $('.error_agregado1').slideUp('slow');
                    },10000);

                }

                function recargar(){
                    location.href = '#HOME';
                }

     </script>





</body>

</html>