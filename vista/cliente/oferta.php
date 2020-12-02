<?php require_once("vistas/parte_superior.php"); ?>






<?php 
include_once 'php/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id_oferta, ID_PEDIDO,  monto_oferta, duracion_oferta, situacion_oferta, nombre_empresa, descripcion_ped, id_pedido
from  oferta_pedido , pedido, cliente, empresa where rela_empresa= id_empresa and rela_cliente=id_cliente and rela_pedido=id_pedido and id_cliente= '".$id_cliente."' " ;
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<center><h1>OFERTAS</h1></center>
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        
<center>
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Numero de Pedido</th>
                                <th>MONTO DE OFERTA</th>
                                <th>DURACION</th>
                                <th>EMPRESA</th>                                
                                <th>PEDIDO</th> 
                                <th>SITUACION</th>
                                <th>ACCIONES</th>     
                                
                                  
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                 <td><?php echo $dat['id_oferta'] ?></td>
                                 <td><?php echo $dat['id_pedido'] ?></td>
                                <td><?php echo $dat['monto_oferta'] ?></td>
                                <td><?php echo $dat['duracion_oferta'] ?></td>
                                <td><?php echo $dat['nombre_empresa'] ?></td>
                                <td><?php echo $dat['descripcion_ped'] ?></td>
                                <td style="color: #15D480" ><?php echo $dat['situacion_oferta'] ?></td>
                                <td style="width:120px;">
		<a href="php/aceptar.php?id_oferta=<?php echo $dat["id_oferta"];?>& id_pedido=<?php echo $dat["id_pedido"];?>" class="btn btn-warning">ACEPTAR</a>
		<br>
		<br>
		<a href="php/eliminar.php?id_oferta=<?php echo $dat["id_oferta"];?>;"
  class="btn btn-sm btn-danger">RECHAZAR</a>
  <br>
  <br>
  <a  href="https://api.whatsapp.com/send?phone=5493704641201&text=Hola,%20Me%20interesa%20la%20Oferta" target="_blank"
  class="btn btn-sm btn-success">WhatsApp</a>


  
                              
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table> 

                       </center>

                    </div>
                </div>
        </div>  
    </div>    







<?php require_once("vistas/parte_inferior.php"); ?>



