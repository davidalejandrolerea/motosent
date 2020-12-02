<?php 
	function SELECT_TIPO_TELEFONO(){

		$consulta = new consulta();
		$filas = $consulta->select_tipo_telefono();

        echo '<select name="RELA_TIPO_TELEFONO" class="form-control input-lg">';
        
			foreach ($filas as $fila){
				echo '<option value="'.$fila['ID_TIPO_TEL'].'">'.$fila['DESCRIPCION'].'</option>';
            }
            
		echo '</select>';

	}	
 ?>