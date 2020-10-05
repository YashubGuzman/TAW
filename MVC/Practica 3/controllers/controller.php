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

    //metodo para registro de usuarios
public function registroUsuariosController(){
    if(isset($_POST["usuarioRegistro"])){
    $datosController = array("usuario"=>$_POST["usuarioRegistro"],
                                "password"=>$_POST["passwordRegistro"],
                                "email"=>$_POST["emailRegistro"],
                                "id_carrera"=>$_POST["carrera"]);
            //Enviamos los parametros al Modelo para que procese el registro
            $respuesta = Datos::registroUsuarioModel($datosController,"usuarios");

            //Recibir la respuesta del modelo para saber que sucedios (success o error)

            if($respuesta == "success"){
                header("location:index.php?action=ok");
            }
            else{
                header("location:index.php");
            }
        }
}

public function registroCarreraController(){
    if(isset($_POST["materiaRegistro"])){
    $datosController = array("materia"=>$_POST["materiaRegistro"]);
            //Enviamos los parametros al Modelo para que procese el registro
            $respuesta = Datos::registroCarreraModel($datosController,"carreras");

            //Recibir la respuesta del modelo para saber que sucedios (success o error)

            if($respuesta == "success"){
                header("location:index.php?action=ok");
            }
            else{
                header("location:index.php");
            }
        }
}
 



                //Método para INGRESO DE USUARIOS
                public function ingresoUsuarioController(){
                    if(isset($_POST["usuarioIngreso"])){
                        $datosController = array("usuario"=>$_POST["usuarioIngreso"],"password"=>$_POST["passwordIngreso"]);

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

                //Método VISTA USUARIOS
                public function vistaUsuariosController(){
                    //Envío al modelo la variable de control y la tabla a donde se hará la consulta.
                    $respuesta = Datos::vistaUsuariosModel("usuarios");
                    foreach($respuesta as $row => $item){
                    echo '<tr>
                            <td>'.$item["usuario"].'</td>
                            <td>'.$item["password"].'</td>
                            <td>'.$item["email"].'</td>
                            <td>'.$item["id_carrera"].'</td>
                            <td><a href="index.php?action=editar&id='.$item["id"].'"><button> Editar </button></td>
                            <td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></td>
                    </tr>';
                }
            }

            public function vistaMateriaController(){
                //Envío al modelo la variable de control y la tabla a donde se hará la consulta.
                $respuesta = Datos::vistaMateriaModel("materias");
                foreach($respuesta as $row => $item){
                echo '<tr>
                        <td>'.$item["materia"].'</td>
                        <td>'.$item["clave"].'</td>
                        <td>'.$item["carrera"].'</td>
                        <td><a href="index.php?action=editarMateria&id='.$item["id_materia"].'"><button> Editar </button></td>
                        <td><a href="index.php?action=materias&idBorrar='.$item["id_materia"].'"><button>Borrar</button></td>
                </tr>';
            }
        }

            //MÉTODO EDITAR USUARIOS
            public function editarUsuarioController(){
                //Solicitar el id del usuario a editar
                $datosController =  $_GET["id"];
                //Enviamos al modelo el id para hacer la consulta y obtener sus datos
                $respuesta = Datos::editarUsuarioModel($datosController, "usuarios");
                $carreras = Conexion::seleccion()->query("SELECT * from carreras");

                //Recibimos respuesta del modelo e IMPRIMIMOS UN FORM PARA EDITAR
                echo '<input type="hidden" value="'.$respuesta["id"].'"name="idEditar">
                      <input type="text" value="'.$respuesta["usuario"].'"name="usuarioEditar" required>
                      <input type="password" value="'.$respuesta["password"].'"name="passwordEditar" required>
                      <input type="email" value="'.$respuesta["email"].'"name="emailEditar" required>
                      <p>Carrera</p>
                        <select name="carrera" >
                        <option value="'.$respuesta["id_carrera"].'">'.$respuesta["carrera"].'</option>';
                        while ($valores = mysqli_fetch_array($carreras)){
                            echo '<option value="'.$valores['id_carrera'].'">'.$valores['carrera'].'</option>';
                        }
                echo '</select>
                <input type="submit" value="Actualizar">';

            }

            //METODO PARA ACTUALIZAR USUARIO
            public function actualizarUsuarioController(){
                if(isset($_POST["usuarioEditar"])){
                    //Preparamos un array con los id de el form del controlador anterior para ejecutar la actualización en un modelo.
                    $datosController=array("id"=>$_POST["idEditar"],
                                            "usuario"=>$_POST["usuarioEditar"],
                                            "password"=>$_POST["passwordEditar"],
                                            "email"=>$_POST["emailEditar"],
                                            "id_carrera"=>$_POST["carrera"]);

                    //Enviar el array a el modelo que generará el UPDATE
                    $respuesta = Datos::actualizarUsuarioModel($datosController,"usuarios");

                    //Recibimos respuesta del modelo para determinar si se llevo a cabo el UPDATE de manera correcta
                    if($respuesta=="success"){
                        header("location:index.php?action=cambio");
                    }
                    else{
                        echo "error";
                    }
                }
            }

            //Borrado de usuario
            public function borrarUsuarioController(){
                if(isset($_GET["idBorrar"])){
                    $datosController = $_GET["idBorrar"];

                    //Mandar ID al controlador para que ejecute el DELETE
                    $respuesta = Datos::borrarUsuarioModel($datosController,"usuarios");

                    //Recibimos la respuesta del modelo de eliminación
                    if($respuesta == "success"){
                        header("location:index.php?action=usuarios");
                    }
                }
            }

            //Método VISTA CARRERAS
            public function vistaCarrerasController(){
                //Envío al modelo la variable de control y la tabla a donde se hará la consulta.
                $respuesta = Datos::vistaCarrerasModel("carreras");
                foreach($respuesta as $row => $item){
                echo '<tr>
                        <td>'.$item["carrera"].'</td>
                        <td><a href="index.php?action=editarCarrera&id='.$item["id_carrera"].'"><button> Editar </button></td>
                        <td><a href="index.php?action=carreras&idborrarCarrera='.$item["id_carrera"].'"><button>Borrar</button></td>
                </tr>';
            }
        }


        //MÉTODO EDITAR CARRERAS
        public function editarCarreraController(){
            //Solicitar el id del usuario a editar
            $datosController =  $_GET["id"];
            //Enviamos al modelo el id para hacer la consulta y obtener sus datos
            $respuesta = Datos::editarCarreraModel($datosController, "carreras");
            //$carreras = Conexion::seleccion()->query("SELECT * from carreras");

            //Recibimos respuesta del modelo e IMPRIMIMOS UN FORM PARA EDITAR
            echo '<input type="hidden" value="'.$respuesta["id_carrera"].'"name="idEditar">
                  <input type="text" value="'.$respuesta["carrera"].'"name="carreraEditar" required>
                  <input type="submit" value="Actualizar">';

        }

        //METODO PARA ACTUALIZAR CARRERAS
        public function actualizarCarreraController(){
            if(isset($_POST["carreraEditar"])){
                //Preparamos un array con los id de el form del controlador anterior para ejecutar la actualización en un modelo.
                $datosController=array("id_carrera"=>$_POST["idEditar"],
                                        "carrera"=>$_POST["carreraEditar"]);

                //Enviar el array a el modelo que generará el UPDATE
                $respuesta = Datos::actualizarCarreraModel($datosController,"carreras");

                //Recibimos respuesta del modelo para determinar si se llevo a cabo el UPDATE de manera correcta
                if($respuesta=="success"){
                    header("location:index.php?action=cambio_carrera");
                }
                else{
                    echo "error";
                }
            }
        }

        //Borrado de CARRERA
        public function borrarCarreraController(){
            if(isset($_GET["idborrarCarrera"])){
                $datosController = $_GET["idborrarCarrera"];

                //Mandar ID al controlador para que ejecute el DELETE
                $respuesta = Datos::borrarCarreraModel($datosController,"carreras");

                //Recibimos la respuesta del modelo de eliminación
                if($respuesta == "success"){
                    header("location:index.php?action=carreras");
                }
            }
        }

        //METODO DE REGISTRAR MATERIA
        public function registroMateriaController(){
            if(isset($_POST["materiaRegistro"])){
            $datosController = array("materia"=>$_POST["materiaRegistro"],
                                     "clave"=>$_POST["claveRegistro"],
                                     "carrera"=>$_POST["carrera"]);
                    //Enviamos los parametros al Modelo para que procese el registro
                    $respuesta = Datos::registroMateriaModel($datosController,"materias");
        
                    //Recibir la respuesta del modelo para saber que sucedios (success o error)
        
                    if($respuesta == "success"){
                        header("location:index.php?action=ok");
                    }
                    else{
                        header("location:index.php");
                    }
                }
        }

        public function editarMateriaController(){
            //Solicitar el id del usuario a editar
            $datosController =  $_GET["id"];
            //Enviamos al modelo el id para hacer la consulta y obtener sus datos
            $respuesta = Datos::editarMateriaModel($datosController, "materias");
            $carreras = Conexion::seleccion()->query("SELECT * from carreras");

            //Recibimos respuesta del modelo e IMPRIMIMOS UN FORM PARA EDITAR
            echo '<input type="hidden" value="'.$respuesta["id_materia"].'"name="idEditar">
                  <input type="text" value="'.$respuesta["materia"].'"name="materiaEditar" required>
                  <input type="text" value="'.$respuesta["clave"].'"name="claveEditar" required>
                  <p>Carrera</p>
                    <select name="carrera" >
                    <option value="'.$respuesta["id_carrera"].'">'.$respuesta["carrera"].'</option>';
                    while ($valores = mysqli_fetch_array($carreras)){
                        echo '<option value="'.$valores['id_carrera'].'">'.$valores['carrera'].'</option>';
                    }
            echo '</select>
            <input type="submit" value="Actualizar">';

        }

        public function actualizarMateriaController(){
            if(isset($_POST["materiaEditar"])){
                //Preparamos un array con los id de el form del controlador anterior para ejecutar la actualización en un modelo.
                $datosController=array("id"=>$_POST["idEditar"],
                                        "materia"=>$_POST["materiaEditar"],
                                        "clave"=>$_POST["claveEditar"],
                                        "id_carrera"=>$_POST["carrera"]);

                //Enviar el array a el modelo que generará el UPDATE
                $respuesta = Datos::actualizarMateriaModel($datosController,"materias");

                //Recibimos respuesta del modelo para determinar si se llevo a cabo el UPDATE de manera correcta
                if($respuesta=="success"){
                    header("location:index.php?action=cambio");
                }
                else{
                    echo "error";
                }
            }
        }

        public function borrarMateriaController(){
            if(isset($_GET["idBorrar"])){
                $datosController = $_GET["idBorrar"];

                //Mandar ID al controlador para que ejecute el DELETE
                $respuesta = Datos::borrarMateriaModel($datosController,"materias");

                //Recibimos la respuesta del modelo de eliminación
                if($respuesta == "success"){
                    header("location:index.php?action=materias");
                }
            }
        }

        
    
    }
    
?>