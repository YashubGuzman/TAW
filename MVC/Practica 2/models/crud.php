<?php
    require_once "conexion.php";
    //Modelo que permite mostrar el enlace de las paginas con las vistas
    class Datos extends Conexion{
        //Metodo del de REGISTRO DE USUARIOS (Recibe datos del controlador)
        public function registroUsuarioModel($datosModels,$tabla){
            //Preparar el modelo para hacer los INSERTs a la BD
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario,contrasena,email) VALUES (:usuario,:password,:email)");
            //prepare() prepara una sentencia SQL para ser ejecutada por el metodo PDOstatment::execute().

            //bindParam() vincula el valor de una variable de PHP a un parametro de sustitución con nombre o signo de interrogación correspondiente. Es la sentencia usada para preparar un query de MySQL.

            stmt->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
            stmt->bindParam(":password",$datosModel["contrasena"],PDO::PARAM_STR);
            stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
            //Verificar ejecución del Query
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }

            //Cerrar las fuciones de la sentencia de PDO
            $stmt->close();
        }
    }
?>