<?php 
require('validacion_login/conexion.php');
session_start();

if(isset($_SESSION['usuario'])){

    if($_SESSION['usuario']['RELA_TIPO_USUARIO']=="2" ){
        header('Location: home.php');       
    } else if( $_SESSION['usuario']['RELA_TIPO_USUARIO']=="1"){
        header('Location: ../../vista/inicio_empresa.php');     
    }
}


 ?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iniciar Sesión</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/mensaje.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/estilos.css">
    <!-- SCRIPT MENSAJE-->
    <script src="js/script.js"></script>

</head>
<body class="bg-gradient-primary" onload="recargar()">
                

        <!-- Outer Row -->
    
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
                                            <?php
                                            if(isset($_GET["exito"]) && $_GET["exito"] == 'true')
                                            {
                                                echo "<div style='color:red'>cuenta creada correctamente</div>";
                                                //echo "<script> alert('ha registrado correctamente su empresa'); window.location= 'login.php'</script>";
                                            }
                                            ?>
                                            <br>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">MOTO SENT FSA</h1>
                                        <h1 class="h4 text-gray-900 mb-4">¡Bienvenido Cliente!</h1>
                                    </div>
                                    <form class="user" action="login.php" method="POST" id="formLg">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" maxlength="30" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="Usuario" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" maxlength="20"  id="contraseña" name="contraseña" placeholder="Password" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recuerdame</label>
                                            </div>
                                        </div>
                                        
                                            <?php
                                            if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
                                            {
                                                echo "<div style='color:red'>Usuario o contraseña invalido </div>";
                                            }
                                            ?>
                                            <br>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Iniciar Sesion">

                                        
                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="Restablecer_contraseña.php">Se te olvido tu contraseña?</a>
                                    </div>

                                    <div class="text-center">
                                         <a class="small" href="registrar_cliente.php">¡Crear una cuenta Cliente!</a>
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

                if (mensaje == 1){

                    $('.error_agregado').slideDown('slow');
                    setTimeout(function(){
                        $('.error_agregado').slideUp('slow');
                    },10000);

                }else if (mensaje == 2){

                    $('.agregado').slideDown('slow');
                    setTimeout(function(){
                        $('.agregado').slideUp('slow');
                    },10000);

                }

                function recargar(){
                    location.href = '#HOME';
                }

     </script>
        


</body>

</html>