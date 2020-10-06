<?php 


class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar" || $enlaces == "salir" || $enlaces == "registrarlibro" || $enlaces == "libros" || $enlaces == "editarlibro"){
			$module =  "views/".$enlaces.".php";
		}else if($enlaces == "index"){
			$module =  "views/registro.php";
		}
		else if($enlaces == "ok_libro"){
			$module =  "views/libros.php";		
		}
		else if($enlaces == "ok"){
			$module =  "views/registro.php";
		}

		else if($enlaces == "fallo"){
			$module =  "views/ingresar.php";	
		}

		else if($enlaces == "cambio"){
			$module =  "views/usuarios.php";		
		}
		else if($enlaces == "cambio_libros"){
			$module =  "views/libros.php";		
		}
		
		else{
			$module =  "views/registro.php";
		}
		
		return $module;
	}

}

?>