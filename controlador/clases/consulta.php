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



		public function select_localidad(){

			$filas = null;
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();
			$sql = "SELECT id_localidad, nombre_loc FROM LOCALIDAD";
			$statement = $conexion->prepare($sql);
			$statement->execute();

			while($resultado = $statement->fetch()){
				$filas[] = $resultado;
			}
			return $filas;
		}   


         public function select_tipo_telefono(){

			$filas = null;
			$modelo = new conexion();
			$conexion = $modelo->retornar_conexion();
			$sql = "SELECT * FROM tipo_telefono";
			$statement = $conexion->prepare($sql);
			$statement->execute();

			while($resultado = $statement->fetch()){
				$filas[] = $resultado;
			}
			return $filas;
		}


		public function asignar_cadete(){
          
				$mensaje = null;
				$nombre = null;

				if(isset($_SESSION['usuario'])){
					if($_SESSION['usuario']['RELA_TIPO_USUARIO']=="1"){
						$mensaje = "Empresa";
						$nombre = $_SESSION['usuario']['nombre_empresa'];
						$id_empresa = $_SESSION['usuario']['id_empresa'];
					}
				} else {

					header('Location: ../../index.php');

				}  

			$filas = null;
			$modelo = new conexion(); // inicializamos un objeto modelo.(conexion)
			$conexion = $modelo->retornar_conexion();
			$sql = "SELECT id_empleados, nombre_pers FROM empleado, persona, empresa, puesto
			where rela_persona=id_persona and rela_empresa=id_empresa and RELA_PUESTO_TRABAJO=id_puesto and estado='si' and  id_empresa= '".$id_empresa."' and estado_disp_ocu='Disponible' and RELA_PUESTO_TRABAJO= 2 ";
			$statement = $conexion->prepare($sql);
			$statement->execute();

			while($resultado = $statement->fetch()){
				$filas[] = $resultado;
			}

			return $filas;
		}







	}

 ?>