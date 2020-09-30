<?php
    require_once "conexion.php";
    //Modelo que permite mostrar el enlace de las paginas con las vistas
    class Datos extends Conexion{
        //Metodo del de REGISTRO DE USUARIOS (Recibe datos del controlador)
        public function registroUsuarioModel($datosModel,$tabla){
            //preparar el modelo para hacer los inserts en la bd
    
            $stmt=conexion::conectar()->prepare("INSERT INTO $tabla(usuario,password,email,id_carrera) VALUES(:usuario,:password,:email,:id_carrera)");
            //prepare prepara una sentencia sql para ser ejecutada por el metodo pdostatement::execute
    
            $stmt->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
            $stmt->bindParam(":password",$datosModel["password"],PDO::PARAM_STR);
            $stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
            $stmt->bindParam(":id_carrera",$datosModel["id_carrera"],PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                return "success";
            }else{
                return "error";
            }
            //cerrar las funciones de las sentencia de pdo
            $stmt->close();
    
        }

        public function registroCarreraModel($datosModel,$tabla){
            //preparar el modelo para hacer los inserts en la bd
    
            $stmt=conexion::conectar()->prepare("INSERT INTO $tabla(carrera) VALUES(:materia)");
            //prepare prepara una sentencia sql para ser ejecutada por el metodo pdostatement::execute
    
            $stmt->bindParam(":materia",$datosModel["materia"],PDO::PARAM_STR);
    
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
            $stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email, carreras.carrera as id_carrera FROM $tabla inner join carreras on usuarios.id_carrera=carreras.id_carrera");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }

        public function vistaMateriaModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id_materia, materia, clave, carreras.id_carrera,carreras.carrera FROM $tabla inner join carreras on $tabla.id_carrera=carreras.id_carrera");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }

        //Método para SELECCIONAR usuarios
        public function editarUsuarioModel($datosModel, $tabla){
            //SELECT
            $stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email,carreras.id_carrera,carreras.carrera FROM usuarios inner join carreras on usuarios.id_carrera = carreras.id_carrera WHERE id=:id");
            $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }
        //Método para ACTUALIZAR usuarios(UPDATE)
        public function actualizarUsuarioModel($datosModel, $tabla){
            //Preparar el QUERY
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, password = :password, email = :email,id_carrera = :id_carrera WHERE id = :id");

            //Ejecutar el QUERY
            $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
            $stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_STR);
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

        //METODO PARA VISTA CARRERAS
        public function vistaCarrerasModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id_carrera, carrera FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }


        //Método para SELECCIONAR CARRERAS
        public function editarCarreraModel($datosModel, $tabla){
            //SELECT
            $stmt = Conexion::conectar()->prepare("SELECT id_carrera, carrera FROM carreras WHERE id_carrera=:id_carrera");
            $stmt->bindParam(":id_carrera", $datosModel, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

        public function actualizarCarreraModel($datosModel, $tabla){
            //Preparar el QUERY
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET carrera = :carrera WHERE id_carrera = :id_carrera");

            //Ejecutar el QUERY
            $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
            $stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_STR);

            //Preparar respuesta
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }

            //Cerrar la conexión PDO
            $stmt->close();
        }

        //Borrar CARRERAS
        public function borrarCarreraModel($datosModel,$tabla){
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_carrera = :id_carrera");
            
            $stmt->bindParam(":id_carrera",$datosModel, PDO::PARAM_STR);

            //Ejecutar
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            $stmt->close();
        }

        public function registroMateriaModel($datosModel,$tabla){
            //preparar el modelo para hacer los inserts en la bd

            $stmt=conexion::conectar()->prepare("INSERT INTO $tabla(materia,clave,id_carrera) VALUES(:materia,:clave,:carrera)");
            //prepare prepara una sentencia sql para ser ejecutada por el metodo pdostatement::execute

            $stmt->bindParam(":materia",$datosModel["materia"],PDO::PARAM_STR);
            $stmt->bindParam(":clave",$datosModel["clave"],PDO::PARAM_STR);
            $stmt->bindParam(":carrera",$datosModel["carrera"],PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "success";
            }else{
                return "error";
            }
            //cerrar las funciones de las sentencia de pdo
            $stmt->close();

        }

        public function editarMateriaModel($datosModel, $tabla){
            //SELECT
            $stmt = Conexion::conectar()->prepare("SELECT id_materia, materia, clave,carreras.id_carrera,carreras.carrera FROM $tabla inner join carreras on $tabla.id_carrera = carreras.id_carrera WHERE id_materia=:id");
            $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

        public function actualizarMateriaModel($datosModel, $tabla){
            //Preparar el QUERY
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET materia = :materia, clave = :clave,id_carrera = :id_carrera WHERE id_materia = :id");

            //Ejecutar el QUERY
            $stmt->bindParam(":materia", $datosModel["materia"], PDO::PARAM_STR);
            $stmt->bindParam(":clave", $datosModel["clave"], PDO::PARAM_STR);
            $stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_STR);
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

        public function borrarMateriaModel($datosModel,$tabla){
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_materia = :id");

            $stmt->bindParam(":id",$datosModel, PDO::PARAM_STR);

            //Ejecutar
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            $stmt->close();
        }
        
    }
?>