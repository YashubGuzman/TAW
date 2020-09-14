<?php
    class MvcController{
        //Llamar a la plantilla template
        public function plantilla(){
            include "views/template.php";
        }
    

    //Metodo para mostrar los enlaces de la pagina
    public function enlacesPaginasController(){
        if(isset($_GET['action'])){
            $enlaces = $_GET['action'];
        }
        else{
            $enlaces = "index";
        }
        $respuesta = Paginas::enlacesPaginasModel($enlaces);
        include $respuesta;
    }

    //Método para registro de usuarios
    public function registroUsuarioController(){
        $datosController = array("usuario"=>$_POST["usuarioRegistro"],
                                    "password"=>$_POST["passwordRegistro"],
                                    "email"=>$_POST["emailRegistro"]);
                //Enviamos los parametros al Modelo para que procese el registro
                $respuesta = Datos::registroUsuarioModel($datosController,"usuarios")

                //Recibir la respuesta del modelo para saber que sucedios (success o error)
                                    
                if($respuesta == "success"){
                    header("location:index.php?action=ok");
                }
                else{
                    header("location:index.php");
                }

                //Método para INGRESO DE USUARIOS
                public function ingresoUsuarioController(){
                    if(isset($_POST["usuarioIngreso"])){
                        $datosController = array("usuario"==>$_POST["usuarioIngreso"],"password"=>$_POST["passwordIngreso"]);

                        //Mandar valores del array al modelo
                        $respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");

                        //Recibe respuesta del modelo
                        if($respuesta["usuario"]==$_POST["usuarioIngreso"] && $respuesta["password"]==$_POST["passwordIngreso"]){
                            session_start();

                            $_SESSION["validar"] = true;

                            header("location:index.php?action=usuarios");
                        }
                        else{
                            header("location:index.php?action=fallo");
                        }
                    }
                }
}
}

?>