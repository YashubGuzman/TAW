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
                                "email"=>$_POST["emailRegistro"]);
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
                            <td><a href="index.php?action=editar&id='.$item["id"].'"><button class="btn btn-primary"> Editar </button>
                            <a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button class="btn btn-danger">Borrar</button></td>
                    </tr>';
                }
            }
            //MÉTODO EDITAR USUARIOS
            public function editarUsuarioController(){
                //Solicitar el id del usuario a editar
                $datosController =  $_GET["id"];
                //Enviamos al modelo el id para hacer la consulta y obtener sus datos
                $respuesta = Datos::editarUsuarioModel($datosController, "usuarios");

                //Recibimos respuesta del modelo e IMPRIMIMOS UN FORM PARA EDITAR
                echo '       
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          <h5 class="card-title text-center">Editar Usuario</h5>
          <form method="post" class="form-signin">

          <div class="form-label-group">
              <input type="hidden" name="idEditar" value="'.$respuesta["id"].'" class="form-control" placeholder="Usuario" required autofocus>
              
            </div>

            <div class="form-label-group">
            <label for="inputEmail">Usuario</label>
              <input type="text" name="usuarioEditar" value="'.$respuesta["usuario"].'" class="form-control" placeholder="Usuario" required autofocus>
              
            </div>

            <div class="form-label-group">
            <label for="inputPassword">Password</label>
              <input type="password" name="passwordEditar" value="'.$respuesta["password"].'" class="form-control" placeholder="Contraseña" required>
              
            </div>

            <div class="form-label-group">
            <label for="inputPassword">Email</label>
              <input type="email" name="emailEditar" value="'.$respuesta["email"].'" class="form-control" placeholder="Email" required>
              
            </div>

            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" >Actualizar</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>';

            }

            //METODO PARA ACTUALIZAR USUARIO
            public function actualizarUsuarioController(){
                if(isset($_POST["usuarioEditar"])){
                    //Preparamos un array con los id de el form del controlador anterior para ejecutar la actualización en un modelo.
                    $datosController=array("id"=>$_POST["idEditar"],
                                            "usuario"=>$_POST["usuarioEditar"],
                                            "password"=>$_POST["passwordEditar"],
                                            "email"=>$_POST["emailEditar"]);

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


            //Método VISTA LIBROS
            public function vistaLibrosController(){
                //Envío al modelo la variable de control y la tabla a donde se hará la consulta.
                $respuesta = Datos::vistaLibrosModel("libros");
                foreach($respuesta as $row => $item){
                echo '<tr>
                        <td>'.$item["isbn"].'</td>
                        <td>'.$item["nombre"].'</td>
                        <td>'.$item["autor"].'</td>
                        <td>'.$item["editorial"].'</td>
                        <td>'.$item["edicion"].'</td>
                        <td>'.$item["anio"].'</td>
                        <td><a href="index.php?action=editarlibro&id='.$item["id_libros"].'"><button class="btn btn-primary"> Editar </button>
                        <a href="index.php?action=libros&idBorrar='.$item["id_libros"].'"><button class="btn btn-danger">Borrar</button></td>
                </tr>';
            }
        }

        //Borrado de LIBROS
        public function borrarLibrosController(){
            if(isset($_GET["idBorrar"])){
                $datosController = $_GET["idBorrar"];

                //Mandar ID al controlador para que ejecute el DELETE
                $respuesta = Datos::borrarLibroModel($datosController,"libros");

                //Recibimos la respuesta del modelo de eliminación
                if($respuesta == "success"){
                    header("location:index.php?action=libros");
                }
            }
        }

            //metodo para registro de LIBROS
        public function registroLibroController(){
            if(isset($_POST["ISBN"])){
                $datosController = array("ISBN"=>$_POST["ISBN"],
                                "nombre"=>$_POST["nombre"],
                                "autor"=>$_POST["autor"],
                                "editorial"=>$_POST["editorial"],
                                "edicion"=>$_POST["edicion"],
                                "ano"=>$_POST["ano"]);

            //Enviamos los parametros al Modelo para que procese el registro
            $respuesta = Datos::registroLibroModel($datosController,"libros");


            //Recibir la respuesta del modelo para saber que sucedios (success o error)

            if($respuesta == "success"){
                header("location:index.php?action=ok");
            }
            else{
                header("location:index.php");
            }
        }
    }

            //MÉTODO EDITAR LIBROS
        public function editarLibroController(){
            //Solicitar el id del usuario a editar
            $datosController =  $_GET["id"];
            //Enviamos al modelo el id para hacer la consulta y obtener sus datos
            $respuesta = Datos::editarLibroModel($datosController, "libros");

            //Recibimos respuesta del modelo e IMPRIMIMOS UN FORM PARA EDITAR
            echo '<body>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                      <div class="card card-signin my-5">
                        <div class="card-body">
                          <h5 class="card-title text-center">Editar libro</h5>
                          <form method="post" class="form-signin">

                          <div class="form-label-group">
                              <input type="hidden" value="'.$respuesta["id_libros"].'" name="idEditar" class="form-control" placeholder="id">
                              
                            </div>

                            <div class="form-label-group">
                            <label for="inputEmail">ISBN</label>
                              <input type="text" value="'.$respuesta["isbn"].'" name="ISBN" class="form-control" placeholder="ISBN" required autofocus>
                              
                            </div>
              
                            <div class="form-label-group">
                            <label for="inputPassword">Nombre</label>
                              <input type="text" value="'.$respuesta["nombre"].'" name="nombre" class="form-control" placeholder="Nombre" required>
                              
                            </div>
              
                            <div class="form-label-group">
                            <label for="inputPassword">Autor</label>
                              <input type="text" value="'.$respuesta["autor"].'" name="autor" class="form-control" placeholder="Autor" required>
                              
                            </div>
              
                            <div class="form-label-group">
                            <label for="inputPassword">Editorial</label>
                              <input type="text" value="'.$respuesta["editorial"].'" name="editorial" class="form-control" placeholder="Editorial" required>
                              
                            </div>
              
                            <div class="form-label-group">
                            <label for="inputPassword">Edicion</label>
                              <input type="text" value="'.$respuesta["edicion"].'" name="edicion" class="form-control" placeholder="Edicion" required>
                              
                            </div>
              
                            <div class="form-label-group">
                            <label for="inputPassword">Año</label>
                              <input type="number" value="'.$respuesta["anio"].'" min="1900" max="2020" name="ano" class="form-control" placeholder="Año" required>
                              
                            </div>
              
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" >Actualizar</button>
              
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </body>';

        }

        //METODO PARA ACTUALIZAR USUARIO
        public function actualizarLibroController(){
            if(isset($_POST["idEditar"])){
                //Preparamos un array con los id de el form del controlador anterior para ejecutar la actualización en un modelo.
                $datosController=array("id"=>$_POST["idEditar"],
                                        "ISBN"=>$_POST["ISBN"],
                                        "nombre"=>$_POST["nombre"],
                                        "autor"=>$_POST["autor"],
                                        "editorial"=>$_POST["editorial"],
                                        "edicion"=>$_POST["edicion"],
                                        "ano"=>$_POST["ano"]);

                //Enviar el array a el modelo que generará el UPDATE
                $respuesta = Datos::actualizarLibroModel($datosController,"libros");

                //Recibimos respuesta del modelo para determinar si se llevo a cabo el UPDATE de manera correcta
                if($respuesta=="success"){
                    echo "Los datos se actualizaron con exito";
                    //header("location:index.php");
                }
                else{
                    echo "error";
                }
            }
        }


        }
    

?>