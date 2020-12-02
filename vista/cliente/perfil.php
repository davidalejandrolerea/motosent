<?php require_once("vistas/parte_superior.php"); 




?>

<h1>Perfil de <?php echo $nombre_per; ?></h1>


<form method="post" action="php/actualizar.php">

  <div class="form-group">
                                
                                <div class="col-md-9">
                                   NOMBRE DE USUARIO:
                                   <br>
                                   <br>
                                    <input type="text" class="form-control" name="nombre_usu" value="<?php echo $nombre_usu ?>" id="nombre_usu">
                                </div>

                                <br>

                                 <div class="col-md-9">
                                   CONTRASEÑA:
                                   <br>
                                   <br>
                                    <input type="text" class="form-control" name="contraseña" value="<?php echo $contraseña ?>" id="contraseña">
                                </div>
                                <br>
                                <br>

                                <div class="form-group">
                                
                                <div class="col-md-9">
                                   CORREO:
                                   <br>
                                   <br>
                                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $email ?>">
                                </div>
                            </div>
                                <br>
                  

                               
                           

                                <input type="hidden" name="id_usuario" value="<?php echo $id_usu; ?>">
  <button type="submit" class="btn btn-warning">Actualizar</button>

                            </form>


                            

<?php require_once("vistas/parte_inferior.php") ?>




