<?php

class Conexion{
    public function conectar(){
        $link = new PDO("mysql:host=localhost;dbname=practica2_bd",'yashub','guzman123');
        return $link;
    }
    //

}

?>