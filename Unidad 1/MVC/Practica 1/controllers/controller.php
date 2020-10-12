<?php
    class MvcController{
        //Llamar a la plantilla template
        public function plantilla(){
            include "views/template.php";
        }
    

    //Metodo para mostrar el contenido de las paginas
    public function enlacesPaginasController(){
        //Verificar la variable 'action' que viene desde los URL's de navegación
        if(isset($_GET["action"])){
            $enlacesController = $_GET["action"];
        }
        else{
            $enlacesController = "index";
        }
        //Mandar el paramatro de "enlacesController al modelo EnlacesPaginas" en su propiedad enlacesPaginasModel
        $respuesta=enlacesPaginas::enlacesPaginasModel($enlacesController);
        include $respuesta;
    }

}

?>