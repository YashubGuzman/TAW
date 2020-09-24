<h1> REGISTRO DE USUARIO </h1>
<form method="post">
    <input type="text" placeholder="Usuario" name="usuarioRegistro" required>
    <input type="password" placeholder="Contraseña" name="usuarioRegistro" required>
    <input type="email" placeholder="Email" name="emailRegistro" required>

    <input type="submit" value="Enviar">
</form>
<?php
    $ingreso = new MvcController();
    $ingreso->ingresoUsuarioController();

    //Verificar la url correcta
    if(isset($_GET["action"])){
        if($_GET["action"]=="ok"){
            echo "Registro exitoso";
        }
    }
    ?>