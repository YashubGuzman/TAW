<h1>Registro de Libro</h1>
<form method="POST">


    <input type="submit" value="Enviar">
</form>

<?php

    $ingreso= new MvcController();
    $ingreso->registroUsuariosController();

    //verificar la url correcta
    if(isset($_GET['action'])){
        if($_GET['action']=="ok"){
            echo "Registro Exitoso";
        }
    }


?>