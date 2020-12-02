

<?php

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT ID_PEDIDO, FECHA_INICIO, FECHA_FIN, DESCRIPCION_PED,direccion_ped,ESTADO FROM pedido, cliente
 where id_cliente= $id_cliente and rela_cliente = id_cliente";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        
<center>
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Nro Pedido</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>                                
                                <th>Descripcion</th> 
                                <th>Direccion</th>   
                                <th>Acciones</th>
                                  
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['ID_PEDIDO'] ?></td>
                                <td><?php echo $dat['FECHA_INICIO'] ?></td>
                                <td><?php echo $dat['FECHA_FIN'] ?></td>
                                <td><?php echo $dat['DESCRIPCION_PED'] ?></td>
                                <td><?php echo $dat['direccion_ped'] ?></td>       
                                <td style="width:120px;">
                                <a href="php/eliminarhistorial.php?ID_PEDIDO=<?php echo $dat["ID_PEDIDO"];?>;" class="btn btn-danger">Eliminar Pedido</a></td>

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


