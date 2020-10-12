<h1> INGRESAR </h1>
<form method="post">
    <input type="text" placeholder="Usuario" name="usuarioIngreso" required>
    <input type="password" placeholder="Contraseña" name="passwordIngreso" required>
    <input type="submit" value="Enviar">
</form>
<?php
    $ingreso = new MvcController();
    $ingreso->ingresoUsuarioController();

    //Verificar la url correcta
    if(isset($_GET["action"])){
        if($_GET["action"]=="fallo"){
            echo "Fallo al ingresar";
        }
    }
    ?>