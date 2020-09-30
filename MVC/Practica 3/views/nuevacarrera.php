<h1>Registrar carrera</h1>

<form method="POST">
    <input type="text" name="materiaRegistro" placeholder="Nombre de la carrera" required>

    <input type="submit" value="Enviar">
</form>

<?php

    $ingreso= new MvcController();
    $ingreso->registroCarreraController();

    //verificar la url correcta
    if(isset($_GET['action'])){
        if($_GET['action']=="ok_carrera"){
            echo "Registro Exitoso";
        }
    }


?>