<?php 


class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar" || $enlaces == "carreras" || $enlaces == "salir" || $enlaces == "nuevacarrera" || $enlaces == "nuevamateria" || $enlaces == "editarMaterias" || $enlaces == "editarCarrera" || $enlaces == "materias"){
			$module =  "views/".$enlaces.".php";
		}else if($enlaces == "index"){
			$module =  "views/registro.php";
		}

		else if($enlaces == "ok"){
			$module =  "views/registro.php";
		}

		else if($enlaces == "ok_carrera"){
			$module =  "views/carreras.php";
		}

		else if($enlaces == "fallo"){
			$module =  "views/ingresar.php";	
		}

		else if($enlaces == "cambio"){
			$module =  "views/usuarios.php";		
		}
		else if($enlaces == "cambio_carrera"){
			$module =  "views/carreras.php";		
		}
		else if($enlaces == "cambio_materia"){
			$module =  "views/materias.php";		
		}
		else{
			$module =  "views/registro.php";
		}
		
		return $module;
	}

}

?>