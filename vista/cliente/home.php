
<?php require_once "vistas/parte_superior.php";?>




<!--INICIO del cont principal-->
<div class="container">
    <center><h1>Historial de Pedidos Realizados</h1></center>
     <head>
    <!-- Required meta tags -->

     <b><center><a data-toggle="modal" href="#myModal" class="btn btn-success">Publicar en Tablon</a></center></b>
<br><br>

 

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
        </div>
            <div class="modal-body">
                <form role="form" method="post"  action="controlador/insert/cargarpedido.php">
                  
                  <div class="form-group">
                    <label for="pedido_cliente">Describir Pedido</label>
                    <input type="text" class="form-control" id="pedido_cliente" name="pedido_cliente" required>
                  </div>
                  <br>

                  

                <label for="direccion_cargada">Añadir Mi Direccion</label>
                <input type="text" name="direccion_cargada" class="form-control" id="direccion_cargada" value="<?php echo $descripcion ?>" readonly>
              

  
                  
                  <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" name="direccion_cliente" id="direccion_cliente" required>
                  </div>

                  <center><b><button  type="submit" class="btn btn-success">PUBLICAR</button></b>
                  </center>

                </form>
            </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->





<?php include "php/tabla.php"; ?>








</div>
</div>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php";?>


<?php require_once "vistas/parte_inferior.php";?>
