<?php 
	function SELECT_PUESTO(){
		$consulta = new consulta();
		$filas = $consulta->select_puesto();

		echo '<select name="RELA_PUESTO_TRABAJO" class="form-control input-lg">';
			foreach ($filas as $fila){

				echo '<option value="'.$fila['ID_PUESTO'].'">'.$fila['DESCRIPCION'].'</option>';

			}
		echo '</select>';

	}	

	
 ?>