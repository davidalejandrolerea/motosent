
<?php
require('validacion_login/conexion.php');
session_start();

if(isset($_SESSION['usuario'])){

    if($_SESSION['usuario']['RELA_TIPO_USUARIO']=="1" ){
        header('Location: vista/inicio_empresa.php');       
    } else if( $_SESSION['usuario']['RELA_TIPO_USUARIO']=="2"){
        header('Location: vista/inicio_cliente.php');     
    }
}

    require_once ('validacion_login/conexion.php');

?>







<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MOTSENTFSA_REGISTRO</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/mensaje.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

                <div class="agregado">
                    <span>El usuario que ingresaste ya esta en uso</span>
                </div>
                <div class="error_agregado">
                    <span>La contraseña que ingresaste no coincide</span>
                </div>
                <div class="error_agregado1">
                <span>El correo ingresado ya esta en uso</span>
                </div>



    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">¡Crear cuenta!</h1>
                            </div>

                            <form class="user" action="controlador/insert/registrar_empresa.php" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="nombre_empresa" name="nombre_empresa" placeholder="Nombre de la empresa" required autocomplete="off">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="cuit_empresa" name="cuit_empresa" placeholder="Cuit de la empresa" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="direccion_empresa" name="direccion_empresa" placeholder="Direccion" required autocomplete="off">
                                </div>
                                
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="correo_empresa" name="correo_empresa" placeholder="Correo electronico" required autocomplete="off">
                                </div>
                                <?php
                                            if(isset($_GET["mansaje"]) && $_GET["mensaje"] == 3 )
                                            {
                                                echo "<div style='color:red'>El correo que ingresaste ya esta en uso!</div>";
                                                //echo "<script> alert('ha registrado correctamente su empresa'); window.location= 'login.php'</script>";
                                            }
                                ?>
                                <br>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="telefono_empresa" name="telefono_empresa" placeholder="Telefono" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="usuario_empresa" name="usuario_empresa" placeholder="Usuario" required autocomplete="off">
                                </div>
                                <?php
                                            if(isset($_GET["mensaje"]) && $_GET["mensaje"] == 4 )
                                            {
                                                echo "<div style='color:red'>El correo que ingresaste ya esta en uso!</div>";
                                                //echo "<script> alert('ha registrado correctamente su empresa'); window.location= 'login.php'</script>";
                                            }
                                ?>
                                <br>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="contraseña" name="contraseña" placeholder="Contraseña" required autocomplete="off">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="validar_contraseña" name="validar_contraseña" placeholder="Repetir contraseña" required autocomplete="off">
                                    </div>
                                </div>
                                <?php
                                /*
                                            if(isset($_GET["falla"]) && $_GET["falla"] == 'true')
                                            {
                                                echo "<div style='color:red'>la contraseña no coincide</div>";
                                                //echo "<script> alert('ha registrado correctamente su empresa'); window.location= 'login.php'</script>";
                                            }*/
                                ?>
                                            <br>

                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Registrar Empresa" id="btnSend">

                                <hr>

                            </form>


                            <hr>
                            <div class="text-center">
                                <a class="small" href="Restablecer_contraseña.php">Se te olvidó tu contraseña?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="index.php">¿Ya tienes una cuenta? ¡Iniciar sesión!</a>
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