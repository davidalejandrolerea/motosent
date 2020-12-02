<?php 
	class consulta{
		public function select_puesto(){

			$filas = null;
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();
			$sql = "SELECT * FROM puesto";
			$statement = $conexion->prepare($sql);
			$statement->execute();

			while($resultado = $statement->fetch()){
				$filas[] = $resultado;
			}
			return $filas;
		}	

	}

 ?>