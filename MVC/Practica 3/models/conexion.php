<?php

class Conexion{
    public function conectar(){
        $link = new PDO("mysql:host=localhost;dbname=practica3_bd",'root','');
        return $link;
    }
    //
    public function seleccion(){
        $mysqli = new mysqli('localhost', "root", "", "practica3_bd");
        return $mysqli;
    }
}

?>