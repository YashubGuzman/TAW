<?php

class Conexion{
    public function conectar(){
        $link = new PDO("mysql:host=localhost;dbname=practica3_bd",'yashub','guzman123');
        return $link;
    }
    //
    public function seleccion(){
        $mysqli = new mysqli('localhost', "yashub", "guzman123", "practica3_bd");
        return $mysqli;
    }
}

?>