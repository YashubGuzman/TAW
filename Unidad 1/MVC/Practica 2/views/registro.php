<h1>Registro de Usuario</h1>
<form method="POST">
    <input type="text" name="usuarioRegistro" placeholder="Usuario" required>
    <input type="password" name="passwordRegistro" placeholder="Contraseña" required>
    <input type="email" name="emailRegistro" placeholder="Email" required>
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