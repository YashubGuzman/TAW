<?php
    require_once "conexion.php";
    //Modelo que permite mostrar el enlace de las paginas con las vistas
    class Datos extends Conexion{
        
        
        //Metodo del de REGISTRO DE LIBROS (Recibe datos del controlador)
        public function registroLibroModel($datosModel,$tabla){
            //preparar el modelo para hacer los inserts en la bd
    
            $stmt=conexion::conectar()->prepare("INSERT INTO $tabla(isbn,nombre,autor,id_libros,editorial,edicion,anio) VALUES(:isbn,:nombre,:autor,:id_libros,editorial,edicion,anio)");
            //prepare prepara una sentencia sql para ser ejecutada por el metodo pdostatement::execute
    
            $stmt->bindParam(":isbn",$datosModel["isbn"],PDO::PARAM_STR);
            $stmt->bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":autor",$datosModel["autor"],PDO::PARAM_STR);
            $stmt->bindParam(":id_libros",$datosModel["id_libros"],PDO::PARAM_INT);
            $stmt->bindParam(":editorial",$datosModel["editorial"],PDO::PARAM_INT);
            $stmt->bindParam(":edicion",$datosModel["edicion"],PDO::PARAM_INT);
            $stmt->bindParam(":anio",$datosModel["anio"],PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                return "success";
            }else{
                return "error";
            }
            //cerrar las funciones de las sentencia de pdo
            $stmt->close();
    
        }

        
        //METODO PARA VISTA LIBROS
        public function vistaUsuariosModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT isbn, nombre, autor, id_libros, editorial, edicion, anio FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }

        //Método para SELECCIONAR LIBROS
        public function editarLibroModel($datosModel, $tabla){
            //SELECT
            $stmt = Conexion::conectar()->prepare("isbn, nombre, autor, id_libros, editorial, edicion, anio FROM libros WHERE id=:id");
            $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

        //Método para ACTUALIZAR usuarios(UPDATE)
        public function actualizarLibroModel($datosModel, $tabla){
            //Preparar el QUERY
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET isbn = :isbn, nombre = :nombre, autor = :autor, id_libros = :id_libros, editorial = :editorial, edicion = :edicion, anio = :anio WHERE id = :id");

            //Ejecutar el QUERY
            $stmt->bindParam(":isbn",$datosModel["isbn"],PDO::PARAM_STR);
            $stmt->bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":autor",$datosModel["autor"],PDO::PARAM_STR);
            $stmt->bindParam(":id_libros",$datosModel["id_libros"],PDO::PARAM_INT);
            $stmt->bindParam(":editorial",$datosModel["editorial"],PDO::PARAM_INT);
            $stmt->bindParam(":edicion",$datosModel["edicion"],PDO::PARAM_INT);
            $stmt->bindParam(":anio",$datosModel["anio"],PDO::PARAM_INT);

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
        public function borrarLibroModel($datosModel,$tabla){
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
        
    }
?>