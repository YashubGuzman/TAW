<?php
    require_once "conexion.php";
    //Modelo que permite mostrar el enlace de las paginas con las vistas
    class Datos extends Conexion{
        //Metodo del de REGISTRO DE USUARIOS (Recibe datos del controlador)
        public function registroUsuarioModel($datosModel,$tabla){
            //preparar el modelo para hacer los inserts en la bd
    
            $stmt=conexion::conectar()->prepare("INSERT INTO $tabla(usuario,password,email) VALUES(:usuario,:password,:email)");
            //prepare prepara una sentencia sql para ser ejecutada por el metodo pdostatement::execute
    
            $stmt->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
            $stmt->bindParam(":password",$datosModel["password"],PDO::PARAM_STR);
            $stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                return "success";
            }else{
                return "error";
            }
            //cerrar las funciones de las sentencia de pdo
            $stmt->close();
    
    
        }
        //METODO INGRESO USUARIO
        public function ingresoUsuarioModel($datosModel,$tabla){
            //Preparamos el PDO
            $stmt=Conexion::conectar()->prepare("SELECT usuario, password, password FROM $tabla WHERE usuario = :usuario");
            //Recibimos el valor "usuario" desde el array almacenado del controlador
            $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
            //ejecutamos la consulta en PDO
            $stmt->execute();
            //Retornamos el fetch que es el que obtiene una fila o posición de un array
            return $stmt->fetch();
            $stmt->close();
        }
        
        //METODO PARA VISTA USUARIO
        public function vistaUsuariosModel($tabla){
            $stmt = Conexion::conectar()->prepare("select id, usuario, password, email FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }

        //Método para SELECCIONAR usuarios
        public function editarUsuarioModel($datosModel, $tabla){
            //SELECT
            $stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla WHERE id = :id");
            $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }
        //Método para ACTUALIZAR usuarios(UPDATE)
        public function actualizarUsuarioModel($datosModel, $tabla){
            //Preparar el QUERY
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, password = :password, email = :email WHERE id = :id");

            //Ejecutar el QUERY
            $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);

            //Preparar respuesta
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }

            //Cerrar la conexión PDO
            $stmt->close();
        }
        //Borrar USUARIOS
        public function borrarUsuarioModel($datosModel,$tabla){
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
            
            $stmt->bindParam(":id",$datosModel, PDO::PARAM_STR);

            //Ejecutar
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            $stmt->close();
        }

        //METODO PARA VISTA LIBROS
        public function vistaLibrosModel($tabla){
            $stmt = Conexion::conectar()->prepare("select id_libros, isbn, nombre, autor, editorial, edicion, anio from $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }

        //Borrar LIBROS
        public function borrarLibroModel($datosModel,$tabla){
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_libros = :id_libros");
            
            $stmt->bindParam(":id_libros",$datosModel, PDO::PARAM_STR);

            //Ejecutar
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            $stmt->close();
        }

        public function registroLibroModel($datosModel,$tabla){
            //preparar el modelo para hacer los inserts en la bd
    
            $stmt=conexion::conectar()->prepare("INSERT INTO $tabla(isbn,nombre,autor,editorial,edicion,anio) VALUES(:isbn,:nombre,:autor,:editorial,:edicion,:ano)");
            //prepare prepara una sentencia sql para ser ejecutada por el metodo pdostatement::execute
    
            $stmt->bindParam(":isbn",$datosModel["ISBN"],PDO::PARAM_STR);
            $stmt->bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":autor",$datosModel["autor"],PDO::PARAM_STR);
            $stmt->bindParam(":editorial",$datosModel["editorial"],PDO::PARAM_STR);
            $stmt->bindParam(":edicion",$datosModel["edicion"],PDO::PARAM_STR);
            $stmt->bindParam(":ano",$datosModel["ano"],PDO::PARAM_INT);

    
            if ($stmt->execute()) {
                return "success";
            }else{
                return "error";
            }

            //cerrar las funciones de las sentencia de pdo
            $stmt->close();

    
        }

        //Método para SELECCIONAR LIBROS
        public function editarLibroModel($datosModel, $tabla){
            //SELECT
            $stmt = Conexion::conectar()->prepare("SELECT id_libros, isbn, nombre, autor, editorial, edicion, anio FROM $tabla WHERE id_libros = :id_libros");
            $stmt->bindParam(":id_libros", $datosModel, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

        //Método para ACTUALIZAR LIBROS(UPDATE)
        public function actualizarLibroModel($datosModel, $tabla){
            //Preparar el QUERY
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET isbn = :isbn, nombre = :nombre, autor = :autor, editorial = :editorial, edicion = :edicion, anio = :ano WHERE id_libros = :id_libros");

            //Ejecutar el QUERY
            $stmt->bindParam(":isbn",$datosModel["ISBN"],PDO::PARAM_STR);
            $stmt->bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":autor",$datosModel["autor"],PDO::PARAM_STR);
            $stmt->bindParam(":editorial",$datosModel["editorial"],PDO::PARAM_STR);
            $stmt->bindParam(":edicion",$datosModel["edicion"],PDO::PARAM_STR);
            $stmt->bindParam(":ano",$datosModel["ano"],PDO::PARAM_INT);
            $stmt->bindParam(":id_libros", $datosModel["id"], PDO::PARAM_STR);


            //Preparar respuesta
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }

            //Cerrar la conexión PDO
            $stmt->close();
        }


        
    }
?>