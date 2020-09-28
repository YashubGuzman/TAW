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
            $stmt = Conexion::conectar()->prepare("select id, usuario, password, email, carreras.carrera as id_carrera FROM $tabla inner join carreras on usuarios.id_carrera=carreras.id_carrera");
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

        //METODO PARA VISTA CARRERAS
        public function vistaCarrerasModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id_carrera, carrera FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }
        
    }
?>