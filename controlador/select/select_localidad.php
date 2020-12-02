<?php 
	function SELECT_LOCALIDAD(){

		$consulta = new consulta();
		$filas = $consulta->select_localidad();

        echo '<select name="RELA_LOCALIDAD" class="form-control input-lg">';
        
			foreach ($filas as $fila){
				echo '<option value="'.$fila['id_localidad'].'">'.$fila['nombre_loc'].'</option>';
            }
            
		echo '</select>';

	}	
 ?>